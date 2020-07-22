<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForSchoolUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('school_user', function (Blueprint $table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_user',function(Blueprint $table){
            $table->dropForeign('school_user_user_id_foreign');
            $table->dropForeign('school_user_school_id_foreign');
        });
    }
}

