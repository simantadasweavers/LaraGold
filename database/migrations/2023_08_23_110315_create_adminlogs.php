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
        Schema::create('adminlogs', function (Blueprint $table) {
            $table->id('logid')->unsigned(false);
            $table->string('logemail');
            $table->string('logpassword');
            $table->date('adate');
            $table->string('atime');
            $table->string('aloc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminlogs');
    }
};
