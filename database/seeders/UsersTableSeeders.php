<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        DB::table('users')->insert([
            'name'=>'Rafif',
            'email'=>'email@gmail.com',
            'password'=>Hash::make('123456'),
            'isAdmin'=>'0',
        ]);

        DB::table('users')->insert([
            'name'=>'Mimin',
            'email'=>'Admin@gmail.com',
            'password'=>Hash::make('123456'),
            'isAdmin'=>'1',
        ]);

    }

}