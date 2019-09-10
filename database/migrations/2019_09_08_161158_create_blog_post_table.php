<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_Post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('blog_writter_name');
            $table->string('blog_content');
            $table->integer('category_id')->comment('category_id is a foregin key from category table');
            $table->string('blog_image');

            $table->date('publish_date');
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
        Schema::dropIfExists('blog_Post');
    }
}
