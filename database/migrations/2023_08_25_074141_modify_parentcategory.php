<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       DB::statement("INSERT INTO parentcategory(parentid,parentname) VALUES(NULL,'gold')");
       DB::statement("INSERT INTO parentcategory(parentid,parentname) VALUES(NULL,'diamond')");
       DB::statement("INSERT INTO parentcategory(parentid,parentname) VALUES(NULL,'rings')");
       DB::statement("INSERT INTO parentcategory(parentid,parentname) VALUES(NULL,'collections')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
