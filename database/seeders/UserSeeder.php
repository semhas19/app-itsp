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
                'name'=>'AkunSuperAdmin',
                'email'=>'superadmin@mail.com',
                'role'=>'superadmin',
                'password'=> bcrypt('superadmin')
            ],
            
            [
                'username'=>'admin',
                'name'=>'AkunAdmin',
                'email'=>'admin@mail.com',
                'role'=>'admin',
                'password'=> bcrypt('admin')
            ],
            [
                'username'=>'petugas',
                'name'=>'AkunPetugas',
                'email'=>'petugas@mail.com',
                'role'=>'petugas',
                'password'=> bcrypt('petugas')
            ],

        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }   
    }
}