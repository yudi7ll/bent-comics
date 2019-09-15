<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentedDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rented_details', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('rented_id');
			$table->unsignedBigInteger('comic_id');
			$table->boolean('is_returned')->default(0);
			$table->timestamp('returned_at')->nullable();
            $table->timestamps();

			$table
			  ->foreign('rented_id')
			  ->references('id')
			  ->on('renteds')
			  ->onDelete('cascade');
			$table
			  ->foreign('comic_id')
			  ->references('id')
			  ->on('comics')
			  ->onDelete('cascade');
			$table->dropForeign('rented_details_rented_id_foreign');
			$table->dropForeign('rented_details_comic_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rented_details');
    }
}
