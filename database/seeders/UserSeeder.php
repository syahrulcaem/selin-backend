<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat pengguna baru
        User::create([
            'name' => 'Ridwan',
            'nip' => '33423318', // Ganti dengan NIP yang sesuai
            'email' => 'ridwan@gmail.com', // Ganti dengan email yang sesuai
            'password' => Hash::make('password123'), // Ganti dengan password yang diinginkan
        ]);

        // Menambahkan lebih banyak pengguna jika perlu
        User::create([
            'name' => 'Wawan',
            'nip' => '33423319', // Ganti dengan NIP yang sesuai
            'email' => 'wawan@gmail.com', // Ganti dengan email yang sesuai
            'password' => Hash::make('password123'), // Ganti dengan password yang diinginkan
        ]);
    }
}
