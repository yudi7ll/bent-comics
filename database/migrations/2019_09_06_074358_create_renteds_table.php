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
			$table->string('user_idktp');
			$table->timestamp('deadline');
			$table->boolean('is_returned')->default(0);
			$table->timestamp('returned_at')->nullable();
			$table->timestamp('rented_at')->default(Carbon::now());

			$table
			  ->foreign('user_idktp')
			  ->references('idktp')
			  ->on('users')
			  ->onDelete('cascade');
			$table->dropForeign('renteds_user_idktp_foreign');
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
