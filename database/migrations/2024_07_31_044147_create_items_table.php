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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('cost');
            $table->integer('stocks');
            $table->string('desccription');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_seller');
            $table->timestamps();
            $table->foreign('id_type')->references('id')->on('types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_seller')->references('id')->on('sellers')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};