<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;

class CreateRentedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renteds', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('user_username');
			$table->timestamp('deadline');
			$table->boolean('is_returned')->default(0);
			$table->timestamp('returned_at')->nullable();
			$table->timestamp('rented_at')->default(Carbon::now());

			$table
			  ->foreign('user_username')
			  ->references('username')
			  ->on('users')
			  ->onDelete('cascade');
			$table->dropForeign('renteds_user_username_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renteds');
    }
}
