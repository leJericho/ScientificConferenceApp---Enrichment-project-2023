<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KonferensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //nama, singkatan website, tempat, tanggal, topik, penyelenggara
        
        DB::table('konferensi')->insert([
            'nama'=>'International Conference on Sciences and Technology',
            'singkatan'=>'ICOSTECH',
            'website'=>'https://icostech.id/',
            'tempat'=>'Online',
            'tanggal'=>'Februari',
            'topik'=>'Renewable Energy, Blockchain, Learning Platform, Decentralize',
            'penyelenggara'=>'Universitas Raharja'
        ]);
    }
}
