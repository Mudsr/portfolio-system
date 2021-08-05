<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'admin', 'guard_name'=> config('auth.defaults.guard')],
            ['name'=>'client', 'guard_name'=> config('auth.defaults.guard')],
        ];
        Role::insert($data);
    }
}
