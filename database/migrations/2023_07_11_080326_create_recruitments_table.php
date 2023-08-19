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
			$table->string('name');
			$table->string('nrp');
			$table->string('strata');
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
