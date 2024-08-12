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
        Schema::create('specifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('stock');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('id_item');
            $table->timestamps();
            $table->foreign('id_item')->references('id')->on('items')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specifications');
    }
};
