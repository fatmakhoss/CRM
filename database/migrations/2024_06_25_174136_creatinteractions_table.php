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
     Schema::create('interactions', function (Blueprint $table){
        $table->id();
        $table->unsignedBigInteger('client_id');
        $table->String('type');
        $table->timestamp('date');
        $table->timestamp('rappel');
        $table->timestamps();
        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
      });


    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interactions');
    }
};
