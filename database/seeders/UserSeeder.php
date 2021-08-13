<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'admin',
            'email'=> 'admin@portfolio.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name'=>'client',
            'email'=> 'client@portfolio.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('client');
    }
}
