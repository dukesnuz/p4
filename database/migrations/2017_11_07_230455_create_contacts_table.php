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
            $table->string('email', 60)->unique();
            $table->char('email_hash', 40)->unique();
            $table->string('telephone', 10);
            $table->string('extension', 10)->nullable();
            $table->string('mobile', 10)->nullable();
            $table->enum('mobile_carrier', ['sprint', 'verizon'])->nullable();
            $table->string('fax', 10)->nullable();
            $table->char('country_code', 3)->default(1);
            $table->softDeletes();
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
