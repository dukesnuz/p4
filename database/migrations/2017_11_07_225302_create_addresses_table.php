<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('address', 100);
            $table->string('suite', 10)->nullable();
            $table->string('city', 60);
            $table->char('state', 3);
            $table->string('zip', 11);
            $table->enum('country', ['US', 'MX', 'CA']);
            $table->enum('type', ['mailing', 'street']);
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
        Schema::dropIfExists('addresses');
    }
}
