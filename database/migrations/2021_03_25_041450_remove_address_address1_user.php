<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAddressAddress1User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function($table) {
            $table->dropColumn('address');
            $table->dropColumn('address1');
            $table->dropColumn('user_id');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function($table) {
            $table->text('address');
            $table->text('address1');
            $table->integer('user_id');
         });
    }
}
