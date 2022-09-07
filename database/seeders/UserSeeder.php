<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        User::create([
            'name' => 'Agil trieanto',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
        ]);
        User::create([
            'name' => 'DoT Indonesia',
            'email' => 'dotindonesia@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
