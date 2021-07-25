<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokBelajarUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_belajar_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_belajar_id')->constrained('kelompok_belajar')->onDelete('cascade');;
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelompok_belajar_user');
    }
}
