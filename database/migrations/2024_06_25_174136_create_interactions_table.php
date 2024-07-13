<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('interactions', function (Blueprint $table){
        $table->id();
        $table->unsignedBigInteger('client_id');
        $table->string('type');
        $table->date('date');
        $table->text('description');
        $table->date('rappel');

        $table->timestamps();
        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
});
}

public function down(): void
    {
        Schema::dropIfExists('interactions');
    }
};
