<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('cover')->default('default.png');
			$table->string('title');
			$table->string('author');
			$table->string('publisher');
			$table->string('genre');
			$table->text('description');
            $table->timestamps();
			$table->index(['title', 'author', 'publisher', 'genre']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
