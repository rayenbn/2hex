<?php

namespace App\Http\Controllers;

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
        return view('transfers.configurator');
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