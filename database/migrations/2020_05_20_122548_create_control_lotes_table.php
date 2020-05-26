<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_lotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->constrained();
            $table->double('quantity_feeder',4,2)->default(1);
            $table->double('min_quantity_feeder',4,2)->default(0.5);
            $table->double('quantity_Silo')->default(20);
            $table->double('min_quantity_Silo')->default(5);
            $table->double('min_temp');
            $table->double('max_temp');
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
        Schema::dropIfExists('control_lotes');
    }
}
