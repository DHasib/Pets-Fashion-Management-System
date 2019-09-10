<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopHeaderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_header_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_contact_number');
            $table->string('shop_email');
            $table->string('shop_fb_link');
            $table->string ('shop_tw_link');
            $table->string ('shop_glg_link');
            $table->string ('shop_pint_link');
            $table->string ('shop_instrsg_link');
            $table->string ('shop_lnkd_link');
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
        Schema::dropIfExists('top_header_details');
    }
}
