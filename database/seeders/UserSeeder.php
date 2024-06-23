<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Luis Beltran';
        $user->email = 'luisbeltran@gmail.com';
        $user->password = bcrypt('admin');
        $user->email_verified_at = '2024-06-22';
        $user->remember_token = Str::random(10);
        $user->save();

    }
}
