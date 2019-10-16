<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new User();
        $teacher->first_name = 'Ayenew';
        $teacher->middle_name = 'Yihune';
        $teacher->last_name = 'Demeke';
        $teacher->user_id = 'ayu';
        $teacher->password = Hash::make('12345678');
        $teacher->save();

        $student = new User();
        $student->first_name = 'Fassil';
        $student->middle_name = 'Lijalem';
        $student->last_name = 'Dinku';
        $student->user_id = 'fasilo';
        $student->password = Hash::make('12345678');
        $student->save();
    }
}
