<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario admin
        DB::table('users')->updateOrInsert(
            [
                'email' => 'admin@yenny.com',
                'name'       => 'admin',
                'password'   => Hash::make('admin123'),
                'is_admin' => true, 
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // Usuario común
        DB::table('users')->updateOrInsert(
            [
                'email' => 'user@yenny.com',
                'name'       => 'usuario',
                'password'   => Hash::make('user123'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
