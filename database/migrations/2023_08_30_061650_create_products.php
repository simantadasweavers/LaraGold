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
        Schema::create('products', function (Blueprint $table) {
            $table->id('prodid')->unsigned(false);
            $table->string('pname');
			$table->string('productcode');
            $table->integer('bid');
			$table->integer('pcid');
            $table->integer('cid');
            $table->string('size');
            $table->string('weight');
			$table->string('purity');
            $table->integer('price');
            $table->integer('disprice')->nullable();
			$table->integer('makingchanrge');
            $table->integer('gst');
            $table->text('pdes');
            $table->mediumText('specification');
			$table->string('img1');
			$table->string('img2');
			$table->string('img3');
			$table->string('img4');
            $table->integer('quantity');
            $table->integer('shipingcost');
            $table->timestamps();
        });


        DB::statement("ALTER TABLE products MODIFY COLUMN prodid bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE products MODIFY COLUMN pname varchar(250) NOT NULL");
        DB::statement("ALTER TABLE products MODIFY COLUMN productcode varchar(250) NOT NULL");
 
	   DB::statement("ALTER TABLE products MODIFY COLUMN bid bigint(20) NOT NULL");
        DB::statement("ALTER TABLE products ADD FOREIGN KEY (bid) REFERENCES brands(brandid)");
        DB::statement("ALTER TABLE products MODIFY COLUMN cid bigint(20) NOT NULL");
		DB::statement("ALTER TABLE products MODIFY COLUMN pcid bigint(20) NOT NULL");
        DB::statement("ALTER TABLE products ADD FOREIGN KEY (cid) REFERENCES category(catid)");
		DB::statement("ALTER TABLE products ADD FOREIGN KEY (pcid) REFERENCES parentcategory(parentid)");
        DB::statement("ALTER TABLE products MODIFY COLUMN size varchar(100)  NULL");
        DB::statement("ALTER TABLE products MODIFY COLUMN price bigint(7) NOT NULL");
        DB::statement("ALTER TABLE products MODIFY COLUMN disprice bigint(7) NULL");
        DB::statement("ALTER TABLE products MODIFY COLUMN gst bigint(7) NOT NULL");
        DB::statement("ALTER TABLE products MODIFY COLUMN pdes text(64000) NOT NULL");
        DB::statement("ALTER TABLE products MODIFY COLUMN specification mediumtext NOT NULL");
        DB::statement("ALTER TABLE products MODIFY COLUMN quantity integer(200) NOT NULL");
        DB::statement("ALTER TABLE products MODIFY COLUMN shipingcost bigint(4) NOT NULL");
		DB::statement("ALTER TABLE products MODIFY COLUMN img1 varchar(200) NOT NULL");
		DB::statement("ALTER TABLE products MODIFY COLUMN img2 varchar(200) NOT NULL");
		DB::statement("ALTER TABLE products MODIFY COLUMN img3 varchar(200) NOT NULL");
		DB::statement("ALTER TABLE products MODIFY COLUMN img4 varchar(200) NOT NULL");
		
		DB::statement("ALTER TABLE products MODIFY COLUMN weight varchar(200) NOT NULL");
		DB::statement("ALTER TABLE products MODIFY COLUMN purity varchar(10) NOT NULL");
		DB::statement("ALTER TABLE products MODIFY COLUMN makingchanrge bigint(6) NOT NULL");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
