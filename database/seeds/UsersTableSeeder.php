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
        $role_teacher = Role::where('name', 'Teacher')->first();
        $role_student = Role::where('name', 'Student')->first();

        $teacher = new User();
        $teacher->first_name = 'Ayenew';
        $teacher->middle_name = 'Yihune';
        $teacher->last_name = 'Demeke';
        $teacher->email = 'ayennew@gmail.com';
        $teacher->phone = '0911280520';
        $teacher->university = 'AASTU';
        $teacher->department = 'Civil Engineering';
        $teacher->password = Hash::make('12345678');
        $teacher->save();
        $teacher->roles()->attach($role_teacher);

        $student = new User();
        $student->first_name = 'Fassil';
        $student->middle_name = 'Lijalem';
        $student->last_name = 'Dinku';
        $student->email = 'profoundeng@gmail.com';
        $student->phone = '0929230780';
        $student->university = 'AAU';
        $student->department = 'Computer Science';
        $student->password = Hash::make('12345678');
        $student->save();
        $student->roles()->attach($role_student);

        $student = new User();
        $student->first_name = 'Solomon';
        $student->middle_name = 'Me';
        $student->last_name = 'Kind';
        $student->email = 'solomon@gmail.com';
        $student->phone = '0929230780';
        $student->university = 'AAU';
        $student->department = 'Computer Science';
        $student->password = Hash::make('12345678');
        $student->save();
        $student->roles()->attach($role_teacher);
    }
}
