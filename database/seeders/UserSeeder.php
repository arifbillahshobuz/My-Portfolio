<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Arif Billah Shoubz',
            'email' => 'info@arifbillahshobuz.com',
            'password' => Hash::make('HelloArif@807502'),
            'phone' => '01953514787',
            'otp' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
