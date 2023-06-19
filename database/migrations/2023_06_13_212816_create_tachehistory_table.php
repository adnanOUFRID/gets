<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachehistoryTable extends Migration
{
    public function up()
    {
        Schema::create('tachehistory', function (Blueprint $table) {
            $table->id();
            $table->string('titre',100);
            $table->string('new_titre',100);
            $table->unsignedBigInteger('tache_id');
            $table->foreign('tache_id')->references('id')->on('taches');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('tachehistory');
    }
}
