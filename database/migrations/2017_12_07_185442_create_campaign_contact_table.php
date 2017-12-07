<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignContactTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('campaign_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('contact_id')->unsigned();
            $table->integer('campaign_id')->unsigned();
            $table->dateTime('opt_out')->nullable();
            $table->softDeletes();

            // Create foreign keys
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('campaign_contact');
    }
}
