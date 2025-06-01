<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin', // tambahkan username jika diperlukan
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(), // tandai email sudah diverifikasi
            'usertype' => 'admin', // tambahkan field role jika pakai sistem role
            'password' => Hash::make('admin'), // ubah ke password aman
            'remember_token' => Str::random(10),
        ]);
    }
}
