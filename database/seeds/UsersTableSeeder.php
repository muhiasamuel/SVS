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


        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();
        $candidateRole = Role::where('name', 'candidate')->first();


$admin = User::create([
    'name'=>'Admin User',
    'email'=>'admin@admin.com',
    'reg_number'=>'123d',
    
    'password'=>Hash::make('password')

]);
$student = User::create([
    'name'=>'Student User',
    'email'=>'student@student.com',
    'reg_number'=>'456f',
 
    'password'=>Hash::make('password')
]);
$candidate = User::create([
    'name'=>'candidate User',
    'email'=>'candidate@candidate.com',
    'reg_number'=>'abcd',
   
    'password'=>Hash::make('password')
]);

$admin->roles()->attach($adminRole);
$student->roles()->attach($studentRole);
$candidate->roles()->attach($candidateRole);

$School = School::select('id')->where('school_name','School of pure and applied sciences')->first();
$candidate->schools()->attach($School);

$School = School::select('id')->where('school_name','General')->first();
$admin->schools()->attach($School);

$School = School::select('id')->where('school_name','School of environmental sciences')->first();
$student->schools()->attach($School);


    }
}
