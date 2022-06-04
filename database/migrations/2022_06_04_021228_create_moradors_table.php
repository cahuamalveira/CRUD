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
        Schema::create(
            'moradores',
            function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('telefone');
                $table->string('email');
                $table->integer('apartamento_id')->unsigned();
                $table->timestamps();

                $table->foreign('apartamento_id')->references('id')->on('apartamentos')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moradors');
    }
};
