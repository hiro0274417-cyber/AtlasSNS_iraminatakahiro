<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * 初期ユーザーデータを登録
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
