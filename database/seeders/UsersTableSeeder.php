<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期ユーザーデータ
        DB::table('users')->insert([
            'username' => 'iramina',
            'email'     => 'hiro0274417@gmail.com',
            'password' => Hash::make('hiro4417'),

            ]);
    }
}
