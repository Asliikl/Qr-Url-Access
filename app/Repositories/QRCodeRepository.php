<?php

namespace App\Repositories;

use App\Models\QRCode;

class QRCodeRepository
{
    public function get($data = [], $paginate = true, $orderBy = 'id', $order = 'desc'): array|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
    {
        $links = QRCode::query();

        if (isset($data['content'])) {
            $links->where('content', $data['content']);
        }
        if (isset($data['path'])) {
            $links->where('path', $data['path']);
        }
        if (isset($data['hashed_id'])) {
            $links->where('hashed_id', $data['hashed_id']);
        }
        $links->orderBy($orderBy, $order);
        return $paginate ? $links->paginate(10) : $links->get();
    }

    public function createQRCode($data, $checkFilter = true): string
    {
        try {
            if ($checkFilter && (filter_var($data, FILTER_VALIDATE_URL) || filter_var($data, FILTER_VALIDATE_EMAIL) || is_numeric($data))) {
                if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
                    $data = 'mailto:' . $data;
                } elseif (is_numeric($data)) {
                    $data = 'tel:' . $data;
                }
                $data = route('redirect', (new LinkRepository())->store([
                    'old_url' => $data,
                ])->new_url);
            }
            $path = 'app/public/qr-codes';
            $hashed_id = md5($data . time());
            if (!file_exists(storage_path($path))) {
                mkdir(storage_path($path), 0777, true);
            }
            \SimpleSoftwareIO\QrCode\Facades\QrCode::generate($data, storage_path($path . '/' . $hashed_id . '.svg'));
            return url('storage/qr-codes/' . $hashed_id . '.svg');
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function store(array $data)
    {
        return QRCode::create($data);
    }

    public function update(array $data, QRCode $qrCode)
    {
        return $qrCode->update($data);
    }

    public function destroy(QRCode $qrCode): void
    {
        $qrCode->delete();
    }
}
