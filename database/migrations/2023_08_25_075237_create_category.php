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
        Schema::create('category', function (Blueprint $table) {
            $table->id('catid')->unsigned(false);
            $table->integer('parentcategoryid');
            $table->string('catname');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE category MODIFY COLUMN catid bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE category MODIFY COLUMN catname VARCHAR(200) NOT NULL");
        DB::statement("ALTER TABLE category MODIFY COLUMN parentcategoryid bigint(20) NOT NULL");
        DB::statement("ALTER TABLE category ADD FOREIGN KEY (parentcategoryid) REFERENCES parentcategory(parentid)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
