<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectContactsAndDispatchers extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('contacts', function(Blueprint $table) {
            $table->integer('dispatcher_id')->unsigned();
            $table->foreign('dispatcher_id')->references('id')->on('dispatchers');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        $table->dropForeign('contacts_dispatcher_id_foreign');
        $table->dropColumn('dispatcher_id');
    }
}
