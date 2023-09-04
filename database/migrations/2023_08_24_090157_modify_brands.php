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
        DB::statement("ALTER TABLE brands MODIFY COLUMN brandid bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE brands MODIFY COLUMN bname varchar(250) NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
