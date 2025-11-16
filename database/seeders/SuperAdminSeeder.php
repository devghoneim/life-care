<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user =  User::create([
            'name'=>'super-admin',
            'email'=>'super-admin@appssquare.com',
            'password'=>Hash::make('123456789'),
            'phone_verified_at'=>now(),
            'email_verified_at'=>now(),

        ]);

        $user->assignRole('super-admin');
    }
}
