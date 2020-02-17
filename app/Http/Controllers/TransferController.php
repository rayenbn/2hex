<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeatTransferRequest;
use App\Jobs\RecalculateHeatTransfers;
use App\Models\Auth\User\User;
use App\Models\HeatTransfer\HeatTransfer;
use App\Models\PaidFile;
use App\Models\Session;
use App\Services\TransferService;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

/**
 * Class TransferController
 * @package App\Http\Controllers
 */
class TransferController extends Controller
{
    /**
     * @var \App\Services\TransferService
     */
    private $service;

    /**
     * TransferController constructor.
     *
     * @param \App\Services\TransferService $service
     */
    public function __construct(TransferService $service)
    {
        $this->middleware('auth')->only('uploadFile');
        $this->service = $service;
    }

    /**
     * Show manufacturer page
     *
     * @return \Illuminate\View\View
     */
    public function manufacturer() : View
    {
        return view('transfers.manufacturer');
    }

    /**
     * Show transfer batch by id
     *
     * @param \Illuminate\Http\Request $request
     * @param int $transferId
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request, int $transferId) : View
    {
        /** @var HeatTransfer $transfer */
        $transfer = HeatTransfer::query()->findOrFail($transferId);

        $filenames = $this->service->getRecentFiles($request->user());

        $totals = $this->service->getTotalAttributes(HeatTransfer::auth()->get());
        $totalQuantity = $totals['totalQuantity'];
        $totalColors = $totals['totalColors'];

        return view(
            'transfers.configurator',
            compact('transfer', 'filenames', 'totalQuantity', 'totalColors')
        );
    }

    /**
     * Show configurator page
     *
     * @return \Illuminate\View\View
     */
    public function configurator() : View
    {
        $filenames = [
            'transfers-small-preview' => [],
            'transfers-full-preview' => [],
        ];

        /** @var \App\Models\Auth\User\User $user */
        $user = auth()->user();
        $isAdmin = $user ? $user->isAdmin() : false;

        /** @var \Illuminate\Database\Eloquent\Collection $transfers */
        $transfers = HeatTransfer::auth()->get();

        $totalQuantity = $transfers->sum('quantity');
        $totalColors = $transfers->sum('colors_count');

        if (empty($user)) {
            return view('transfers.configurator', compact('filenames', 'isAdmin'));
        }

        /** @var \Illuminate\Database\Eloquent\Collection|PaidFile[] $fileActions */
        $fileActions = PaidFile::query()
            ->where('created_by', $user->id)
            ->get();

        foreach (array_keys($filenames) as $value) {
            $count = 0;

            $path = public_path('uploads/' .  $user->name . '/' . $value);

            if (\File::exists($path) == false) {
                continue;
            }

            $filesInFolder = \File::files($path);

            /**
             * @var $filepath \SplFileInfo
             */
            foreach($filesInFolder as $filepath) {
                $filenames[$value][$count] = [];
                $filenames[$value][$count]['name'] = $filepath->getFilename();
                $filenames[$value][$count]['is_disable'] = false;
                $filenames[$value][$count]['color_qty'] = '';
                $filenames[$value][$count]['paid'] = false;
                /** @var PaidFile|null $fileAction */
                $fileAction = $fileActions
                    ->where('file_name', $filepath->getFilename())
                    ->first();

                if (empty($fileAction)) {
                    $count++;
                    continue;
                }

                $filenames[$value][$count]['paid'] = $fileAction->date != null;
                $filenames[$value][$count]['color_qty'] = empty($fileAction['color_qty'])
                    ? ''
                    : ($fileAction['color_qty'] == 4
                        ? 'CMYK'
                        : $fileAction['color_qty'] . ' color');
                $count++;
            }

        }

        return view('transfers.configurator', compact('filenames', 'isAdmin', 'totalQuantity', 'totalColors'));
    }

    /**
     * Upload file
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Exception
     *
     * @return mixed|string
     */
    public function uploadFile(Request $request)
    {
        $request->validate(['file' => 'required|file']);

        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $request->file('file');

        /** @var \App\Models\Auth\User\User $authUser */
        $authUser = auth()->user();

        $path = public_path('uploads/' . $authUser->name . '/' . $request->get('typeUpload', 'default'));
        $name = $request->get('fileName', $file->getClientOriginalName());

        \DB::beginTransaction();

        try {
            if(!\File::exists($path)) {
                \File::makeDirectory($path, $mode = 0777, true, true);
            }

            $file->move($path, $name);

            Session::query()->create([
                'action' => Session\Enum\Type::UPLOAD,
                'created_by' => $authUser->id,
                'comment' => $name
            ]);

            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollBack();
            throw new UploadException($e->getMessage(), 400, $e);
        }

        return $name;
    }

    /**
     * Store heat transfer batch
     *
     * @param \App\Http\Requests\StoreHeatTransferRequest $request
     * @param \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreHeatTransferRequest $request)
    {
        /** @var User|null $authUser */
        $authUser = auth()->user();
        $createdBy = (string) (isset($authUser) ? $authUser->id : csrf_token());

        $payload = $request->validated();
        $payload['created_by'] = $createdBy;

        /** @var HeatTransfer $heatTransfer */
        $heatTransfer = HeatTransfer::query()->create($payload);

        Session::query()->create([
            'action' => Session\Enum\Type::SAVE_HEAT_TRANSFER_BATCH,
            'created_by' => $createdBy,
            'comment' => $heatTransfer->id,
        ]);

        dispatch(new RecalculateHeatTransfers);

        return redirect()->route('profile', ['#saved_orders']);
    }

    /**
     * Destroy transfer batch by id
     *
     * @param \Illuminate\Http\Request $request
     * @param int $transferId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, int $transferId)
    {
        /** @var \App\Models\Auth\User\User|null $user */
        $user = $request->user();

        HeatTransfer::query()->whereKey($transferId)->delete();

        Session::query()->create([
            'action' => Session\Enum\Type::DELETE_HEAT_TRANSFER,
            'created_by' => $user ? $user->id : csrf_token(),
            'comment' => $transferId
        ]);

        dispatch(new RecalculateHeatTransfers);

        return redirect()->route('summary');
    }

    /**
     * Copy transfer batch by id
     *
     * @param int $transferId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function copy(int $transferId) : \Illuminate\Http\RedirectResponse
    {
        /** @var HeatTransfer $transfer */
        $transfer = HeatTransfer::query()->findOrFail($transferId);

        /** @var HeatTransfer $cloneBatch */
        $cloneBatch = $transfer->replicate();
        $cloneBatch->push();

        dispatch(new RecalculateHeatTransfers);

        return redirect()->route('summary');
    }

    /**
     * Save transfer to batch
     *
     * @param \Illuminate\Http\Request $request
     * @param int $transferId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveToBatch(Request $request, int $transferId)
    {
        /** @var \App\Models\Auth\User\User|null $user */
        $user = $request->user();

        /** @var HeatTransfer $transfer */
        $transfer = HeatTransfer::query()->whereKey($transferId)->firstOrFail();

        /** @var HeatTransfer $cloneBatch */
        $cloneBatch = $transfer->replicate();
        $cloneBatch->usenow = 0;
        $cloneBatch->saved_batch = 1;
        $cloneBatch->submit = 0;
        $cloneBatch->saved_date = null;
        $cloneBatch->invoice_number = null;
        $cloneBatch->push();

        Session::query()->create([
            'action' => Session\Enum\Type::SAVE_WHEEL_BATCH,
            'created_by' => $user ? $user->id : csrf_token(),
            'comment' => $transferId,
        ]);

        return redirect()->route('profile', ['#saved_orders']);
    }
}