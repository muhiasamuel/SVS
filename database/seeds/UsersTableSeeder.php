<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
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

        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();
        $userRole = Role::where('name', 'user')->first();


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
$user = User::create([
    'name'=>'generic User',
    'email'=>'user@user.com',
    'reg_number'=>'abcd',
    'password'=>Hash::make('password')
]);

$admin->roles()->attach($adminRole);
$student->roles()->attach($studentRole);
$user->roles()->attach($userRole);
    }
}
