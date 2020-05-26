<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->constrained();
            $table->date('date')->current();
            $table->integer('cant_fund')->default(0);
            $table->integer('feed');
            $table->integer('feed_cumulative');
            $table->integer('deaths')->default(0);
            $table->integer('cumulative_deaths')->default(0);
            $table->integer('cumulative_deaths_percent')->default(0);
            $table->integer('total_birds');
            $table->integer('weight_gr')->nullable();
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
        Schema::dropIfExists('daily_reports');
    }
}
