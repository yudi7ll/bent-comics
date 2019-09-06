<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

	  Schema::create('comic_chapters', function (Blueprint $table) {
		  $table->bigIncrements('id');
		  $table->unsignedBigInteger('comic_id');
		  $table->integer('season');
		  $table->integer('chapter');
		  $table->timestamps();

		  $table
			->foreign('comic_id')
			->references('id')
			->on('comics')
			->onDelete('cascade');
		  $table->dropForeign('comic_chapters_comic_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	  Schema::dropIfExists('comic_chapters');
    }
}
