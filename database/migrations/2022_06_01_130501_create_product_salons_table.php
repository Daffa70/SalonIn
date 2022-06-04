<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_salons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('packet_name');
            $table->text('desc');
            $table->integer('price');
            $table->foreignId('id_salon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_salons');
    }
};
