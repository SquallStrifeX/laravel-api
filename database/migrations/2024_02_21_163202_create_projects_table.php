<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->unique();
            $table->text('description');
            $table->string('repository_link')->default('https://dan.com/buy-domain/deckow.com?redirected=true');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->string('img')->nullable();
            $table->string('slug');
            $table->unsignedBigInteger('type_id')->nullable(); // Aggiungi questa riga
            $table->foreign('type_id')->references('id')->on('types'); // Aggiungi questa riga
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
        Schema::dropIfExists('projects');
    }
};
