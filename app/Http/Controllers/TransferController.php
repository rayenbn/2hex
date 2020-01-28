<?php

namespace App\Http\Controllers;

use App\Models\PaidFile;
use App\Models\Session;
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
     * TransferController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('uploadFile');
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

        return view('transfers.configurator', compact('filenames', 'isAdmin'));
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
}