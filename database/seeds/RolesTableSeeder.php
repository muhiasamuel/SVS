<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        Role::truncate();

        Role::create(['name' =>'admin']);
        Role::create(['name' =>'student']);
        Role::create(['name' =>'candidate']);
        Role::create(['name' =>'delegate']);

    }
}
