<?php

use Illuminate\Database\Seeder;
use App\School;
class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::truncate();

        School::create(['school_name' =>'General','facultyId'=>'sd453']);
        School::create(['school_name' =>'School of pure and applied sciences','facultyId'=>'sdf453']);
        School::create(['school_name' =>'School of environmental sciences','facultyId'=>'ss453']);
    }

    
}
