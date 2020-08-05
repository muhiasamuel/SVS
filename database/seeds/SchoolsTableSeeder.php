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

        School::create(['school_name' =>'General','facultyId'=>'G453']);
        School::create(['school_name' =>'School Of Pure And Applied Science','facultyId'=>'SBf453']);
        School::create(['school_name' =>'School Of Environmental Science','facultyId'=>'SE453']);
        School::create(['school_name' =>'School Of Business','facultyId'=>'BS453']);
    }

    
}
