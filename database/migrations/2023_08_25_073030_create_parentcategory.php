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
        Schema::create('parentcategory', function (Blueprint $table) {
            $table->id('parentid')->unsigned(false);
            $table->string('parentname');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE parentcategory MODIFY COLUMN parentid bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE parentcategory MODIFY COLUMN parentname VARCHAR(250) NOT NULL");      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parentcategory');
    }
};
