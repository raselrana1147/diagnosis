<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('report_id');
           $table->unsignedBigInteger('test_id');
           $table->string('positive')->nullable();
           $table->string('negative')->nullable();
           $table->timestamps();
           $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
           $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}
