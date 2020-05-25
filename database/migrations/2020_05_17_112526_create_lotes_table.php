<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('quantity');
            $table->string('observation')->nullable();
            $table->char('state')->default('W'); //A. active W. waiting F. finish
            $table->date('date_in')->nullable(); //TODO no olvidar quitar el nullable al finalizar las pruebas
            $table->date('date_out')->nullable(); 
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('lotes');
    }
}
