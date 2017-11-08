<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name', 20);
            $table->string('last_name', 60);
            $table->enum('title', ['dispatcher', 'sales']);
            $table->string('email', 60);
            $table->char('email_hash', 40);
            $table->string('telephone', 10);
            $table->string('mobile', 10);
            $table->string('extension', 10);
            $table->string('fax', 10);
            $table->string('country_code', 5)->default(1);
            $table->tinyInteger('delete')->default(0)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}