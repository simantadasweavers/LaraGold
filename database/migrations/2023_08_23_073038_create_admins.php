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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('adminid')->unsigned(false);
            $table->string('name');
            $table->string('email');
            $table->string('passwd');
            $table->timestamps();
        });

        DB::statement("INSERT INTO admins(adminid,name,email,passwd) VALUES(NULL,'SHIMANTA DAS','demo@gmail.com','demo123')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
