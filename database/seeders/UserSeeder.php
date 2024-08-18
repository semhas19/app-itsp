<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username'=>'superadmin',
                'name'=>'Super Admin',
                'email'=>'superadmin@mail.com',
                'role'=>'superadmin',
                'password'=> bcrypt('superadmin')
            ],
            
            [
                'username'=>'admin',
                'name'=>'Admin',
                'email'=>'admin@mail.com',
                'role'=>'admin',
                'password'=> bcrypt('admin')
            ],
            [
                'username'=>'pegawai',
                'name'=>'Pegawai',
                'email'=>'pegawai@mail.com',
                'role'=>'pegawai',
                'password'=> bcrypt('pegawai')
            ],

        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }   
    }
}