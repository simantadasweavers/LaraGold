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
        DB::statement("ALTER TABLE adminlogs MODIFY COLUMN logid bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1");
        DB::statement("ALTER TABLE adminlogs MODIFY COLUMN atime varchar(100)");
        DB::statement("ALTER TABLE adminlogs MODIFY COLUMN aloc varchar(200)");
        DB::statement("ALTER TABLE adminlogs MODIFY COLUMN logemail varchar(200)");
        DB::statement("ALTER TABLE adminlogs MODIFY COLUMN logpassword varchar(200)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
