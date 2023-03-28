<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transports', function (Blueprint $table) {
            $table->string('jan_code')->nullable()->change();
            $table->string('out_date')->nullable()->change();
            $table->string('box_no')->nullable()->change();
            $table->string('weight')->nullable()->change();
            $table->string('amount')->nullable()->change();
            $table->string('transport_no')->nullable()->change();
            $table->string('name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('transports');
    }
}
