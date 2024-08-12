<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_item');
            $table->unsignedBigInteger('id_user');
            $table->text('shipping_addres');
            $table->string('note');
            $table->integer('bill');
            $table->integer('total');
            $table->integer('shipping');
            $table->integer('estimate');
            $table->timestamps();
            $table->foreign('id_item')->references('id')->on('items')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
