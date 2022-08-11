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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_prescriptions_id')->unsigned();
            $table->foreign('user_prescriptions_id')->references('id')->on('user_prescriptions')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('drugs_id')->unsigned();
            $table->foreign('drugs_id')->references('id')->on('drugs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->double('amount');
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
        Schema::dropIfExists('quotations');
    }
};
