<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id');
            $table->integer('marca_id');
            $table->string('codigo');
            $table->string('nombre');
            $table->text('texto');
            $table->integer('precio')->default(0);
            $table->string('url_youtube')->default('');
            $table->enum('destacar', ['Si', 'No'])->default('No');
            $table->enum('publicar', ['Si', 'No'])->default('Si');
            $table->enum('promocion', ['Si', 'No'])->default('No');
            $table->enum('disponible', ['Si', 'No'])->default('Si');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('productos');
    }
}
