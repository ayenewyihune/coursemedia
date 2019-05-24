<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'Teacher';
        $role_user->description = 'A teacher role';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Student';
        $role_user->description = 'A student role';
        $role_user->save();
    }
}
