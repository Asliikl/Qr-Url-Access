<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QRCode\DestroyRequest;
use App\Http\Requests\Admin\QRCode\EditRequest;
use App\Http\Requests\Admin\QRCode\IndexRequest;
use App\Http\Requests\Admin\QRCode\SaveRequest;
use App\Http\Requests\Admin\QRCode\StoreRequest;
use App\Http\Requests\Admin\QRCode\UpdateRequest;
use App\Models\QRCode;
use App\Repositories\QRCodeRepository;

class QRCodeController extends Controller
{
    public function __construct(private QRCodeRepository $QRCodeRepository)
    {
        $this->QRCodeRepository = $QRCodeRepository;
    }

    public function index(IndexRequest $request)
    {
        $qrCodes = $this->QRCodeRepository->get();
        return view('admin.qr-codes.index', compact('qrCodes'));
    }

    public function store(StoreRequest $request)
    {
        return view('admin.qr-codes.form');
    }

    public function save(SaveRequest $request)
    {
        $qrCode = $this->QRCodeRepository->createQRCode($request->get('content'));
        if (!$qrCode) {
            return redirect()->route('qr-codes.index')->with($this->sendAlert('error', 'Error', 'QR Code not created'));
        }
        $this->QRCodeRepository->store([
            'content' => $request->get('content'),
            'path' => $qrCode,
        ]);
        return redirect()->route('qr-codes.index')->with($this->sendAlert('success', 'Success', 'QR Code Created Successfully'));
    }

    public function destroy(DestroyRequest $request, QRCode $qrCode)
    {
        $this->QRCodeRepository->destroy($qrCode);
        return redirect()->route('qr-codes.index')->with($this->sendAlert('success', 'Success', 'Link delete successfully'));
    }
}
