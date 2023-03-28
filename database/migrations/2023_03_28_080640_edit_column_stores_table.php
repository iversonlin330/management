<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->string('c_date')->nullable()->change();
            $table->string('in_date')->nullable()->change();
            $table->string('location')->nullable()->change();
            $table->string('store_no')->nullable()->change();
            $table->string('content')->nullable()->change();
            $table->string('amount')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('stores');
    }
}
