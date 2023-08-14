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
		Schema::create('recruitments', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignId('user_id')->constrained('users');
			$table->string('name');
			$table->string('nrp');
			$table->enum('strata', ['d3', 'S1 terapan']);
			$table->text('prodi');
			$table->string('place_of_birth');
			$table->string('date_of_birth');
			$table->enum('gender', ['male', 'female']);
			$table->string('religion');
			$table->text('boarding_address');
			$table->text('home_address');
			$table->string('email');
			$table->string('phone');
			$table->string('mbti');
			$table->text('motto');
			$table->text('interest');
			$table->text('reason');
			$table->enum('division', ['Reporter', 'Videographer', 'Graphic Designer', 'Fotografer', 'Webmaster']);
			$table->text('description');
			$table->longText('url_portofolio');
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
		Schema::dropIfExists('recruitments');
	}
};
