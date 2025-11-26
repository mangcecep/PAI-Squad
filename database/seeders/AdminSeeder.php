<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '123456', // otomatis di-hash dari model accessor
            'role' => 'admin',
        ]);
    }
}
