<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizJawabanMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_jawaban_murid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id');
            $table->foreignId('murid_id');
            $table->string('jawaban_murid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_jawaban_murid');
    }
}
