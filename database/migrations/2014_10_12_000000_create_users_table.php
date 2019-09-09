<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	  Schema::create('users', function (Blueprint $table) {
		$table->string('name');
		$table->string('email')->unique();
		$table->string('username')->unique()->primary();
		$table->smallInteger('level')->default(3);
		$table->timestamp('email_verified_at')->nullable();
		$table->string('password');
		$table->string('api_token', 80)
		  ->unique()
		  ->nullable()
		  ->default(null);
		$table->string('picture')->default('default.png');
		$table->date('birth_date')->nullable()->default(null);
		$table->rememberToken();
		$table->timestamps();
		$table->index(['username', 'email', 'name']);
	  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
