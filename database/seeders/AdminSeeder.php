<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRepository = new AdminRepository();
        if (!$adminRepository->get(['email' => 'admin@admin.com'])->first()) {
            $adminRepository->store([
                'name' => 'Admin',
                'surname' => 'Test',
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        }
    }
}
