<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            
            $table->string('title');
            $table->string('gender');
            $table->text('description');
            $table->bigInteger('price');
            $table->integer('stock');
            $table->integer('discount')->nullable();
            
        
            $table->string('image');

            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
   
        Schema::dropIfExists('pets');
        Schema::enableForeignKeyConstraints();
        
    }
}
