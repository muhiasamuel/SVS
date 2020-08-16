<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\School;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        DB::table('school_user')->truncate();
        DB::table('polls')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();
        $candidateRole = Role::where('name', 'candidate')->first();
        $delegateRole = Role::where('name', 'delegate')->first();


$admin = User::create([
    'name'=>'Admin User',
    'email'=>'admin@admin.com',
    'reg_number'=>'123d',
    'school_name'=>'General',
    'password'=>Hash::make('password')

]);
$student = User::create([
    'name'=>'Student User',
    'email'=>'student@student.com',
    'reg_number'=>'456f',
    'school_name'=>'School Of Environmental Science',
    'password'=>Hash::make('password')
]);
$candidate = User::create([
    'name'=>'candidate User',
    'email'=>'candidate@candidate.com',
    'reg_number'=>'abcd',
    'school_name'=>'School Of Pure And Applied Science',
    'designation'=>'Secretary General',
    'password'=>Hash::make('password')
]);
$delegate = User::create([
    'name'=>'delegate User',
    'email'=>'delegate@delegate.com',
    'reg_number'=>'srttsy',
    'school_name'=>'School Of Business',
    'designation'=>'Male Delegate',
    'password'=>Hash::make('password')
]);
$admin->roles()->attach($adminRole);
$student->roles()->attach($studentRole);
$candidate->roles()->attach($candidateRole);
$delegate->roles()->attach($delegateRole);

$School = School::select('id')->where('school_name','School Of Pure And Applied Science')->first();
$candidate->schools()->attach($School);

$School = School::select('id')->where('school_name','General')->first();
$admin->schools()->attach($School);

$School = School::select('id')->where('school_name','School Of Environmental Science')->first();
$student->schools()->attach($School);

$School = School::select('id')->where('school_name','School Of Business')->first();
$delegate->schools()->attach($School);


    }
}
