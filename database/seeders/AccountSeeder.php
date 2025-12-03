<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    public function run()
    {
        // Cek jika admin sudah ada
        if (!Account::where('email', 'admin@admin.com')->exists()) {
            Account::create([
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => Hash::make('13242424'),
                'role' => 'admin',
            ]);
        }
    }
}
