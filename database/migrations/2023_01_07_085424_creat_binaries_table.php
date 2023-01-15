<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatBinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->integer('Direct_sponsr')->nullable();
            $table->integer('sponsr')->nullable();
            $table->integer('customer_id');
            $table->integer('position')->nullable();
            $table->integer('downfall')->nullable();
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
        //
    }
}
