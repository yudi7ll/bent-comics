<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Genre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	  Schema::create('genre', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->string('key');
		$table->string('genre');
	  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	  Schema::dropIfExists('genre');
    }
}
