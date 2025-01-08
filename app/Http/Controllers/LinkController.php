<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\LinkGenerateRequest;
use App\Repositories\LinkRepository;
use App\Repositories\QRCodeRepository;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function generate(LinkGenerateRequest $request)
    {
        $lastUrl = '';
        $isOurUrl = false;
        $type = $request->get('type');
        $data = $request->get('data');
        if ($type == 'url') {
            $lastUrl = $data['url'];
            $isOurUrl = true;
        } elseif ($type == 'phone') {
            $lastUrl = 'tel:' . $data['phone'];
            $isOurUrl = true;
        } elseif ($type == 'email') {
            $lastUrl = 'mailto:' . $data['email'] . '?subject=' . $data['subject'] . '&body=' . $data['message'];
            $isOurUrl = true;
        } elseif ($type == 'sms') {
            $lastUrl = 'SMSTO:' . $data['phone'] . ':' . $data['message'];
        } elseif ($type == 'vcard') {
            $lastUrl = 'BEGIN:VCARD
VERSION:'.($data['version'] ?? '3.0').'
N:'.($data['lastname'] ?? '').';'.($data['firstname'] ?? '').'
FN:'.($data['firstname'] ?? '').' '.($data['lastname'] ?? '').'
TITLE:'.($data['position_work'] ?? '').'
ORG:'.($data['organization'] ?? ''). '
URL:'.($data['website'] ?? '').'
EMAIL;TYPE=INTERNET:'.($data['email'] ?? '').'
TEL;TYPE=voice,work,pref:'.($data['phone_work'] ?? '').'
TEL;TYPE=voice,home,pref:'.($data['phone_private'] ?? '').'
TEL;TYPE=voice,cell,pref:'.($data['phone_mobile'] ?? '').'
TEL;TYPE=fax,work,pref:'.($data['fax_work'] ?? '').'
TEL;TYPE=fax,home,pref:'.($data['fax_private'] ?? '').'
ADR:;;'.($data['street'] ?? '').';'.($data['city'] ?? '').';'.($data['state'] ?? '').';'.($data['zipcode'] ?? '').';'.($data['country'] ?? '').'
END:VCARD';
        } elseif ($type == 'mecard') {
            $lastUrl = 'MECARD:N:'.($data['lastname'] ?? '').','.($data['firstname'] ?? '').';NICKNAME:'.($data['nickname'] ?? '').';TEL:'.($data['phone_1'] ?? '').';TEL:'.($data['phone_2'] ?? '').';TEL:'.($data['phone_3'] ?? '').';EMAIL:'.($data['email'] ?? '').';BDAY:'.(isset($data['birthday']) ? str_replace('-','',$data['birthday']) : '').';NOTE:'.($data['notes'] ?? '').';ADR:,,'.($data['street'] ?? '').','.($data['city'] ?? '').','.($data['state'] ?? '').','.($data['zipcode'] ?? '').','.($data['country'] ?? '').';;';
        } elseif ($type == 'wifi') {
            $lastUrl = 'WIFI:T:'.($data['encryption'] ?? '').';S:'.($data['ssid'] ?? '').';P:'.($data['password'] ?? '').';H:;;';
        } elseif ($type == 'whatsapp') {
            $lastUrl = 'https://api.whatsapp.com/send?phone=' . $data['phone'] . '&text=' . $data['message'];
            $isOurUrl = true;
        }

        if ($isOurUrl){
            $shortLink = (new LinkRepository())->store([
                'old_url' => $lastUrl
            ]);
            $qrCodeUrl = route('redirect', $shortLink->new_url);
        }else{
            $qrCodeUrl = $lastUrl;
        }

        $qrCodeRepository = new QRCodeRepository();
        $qrCode = $qrCodeRepository->createQRCode($qrCodeUrl, false);
        if (!$qrCode) {
            return response()->json([
                'message' => 'Something went wrong!'
            ], 500);
        }
        $qrCodeRepository->store([
            'content' => $qrCodeUrl,
            'path' => $qrCode,
        ]);

        return response()->json([
            'message' => 'Success!',
            'status' => 'success',
            'data' => [
                'qr_code' => $qrCode,
                'short_link' => $qrCodeUrl,
                'is_our_url' => $isOurUrl ? 1 : 0,
            ]
        ]);
    }

    public function redirect($code)
    {
        $checkCode = (new LinkRepository())->get([
            'new_url' => $code
        ], false)->first();

        if (!$checkCode) {
            abort(404);
        }

        return redirect()->away($checkCode->old_url);
    }
}
