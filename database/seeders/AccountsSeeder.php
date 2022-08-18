<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Frances Trisha Purisima',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'first_name' => 'Frances Trisha',
            'middle_name' => 'Urbina',
            'last_name' => 'Purisima',
            'address' => 'None',
            'isNew' => false,
            'phonenumber' => '09563326581'
        ]);
        
    }
}
