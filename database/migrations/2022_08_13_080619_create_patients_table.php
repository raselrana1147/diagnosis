<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('age');
            $table->string('nid')->nullable();
            $table->string('passport');
            $table->string('patient_number')->unique();
            $table->enum('gender',['male','female','other']);
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('patients');
    }
}
