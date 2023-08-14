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
		Schema::create('achivements', function (Blueprint $table) {
			$table->id();
			$table->uuid('recruitment_id');
			$table->foreign('recruitment_id')->references('id')->on('recruitments');
			$table->text('date');
			$table->text('title');
			$table->string('achivement');
			$table->string('level');
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
		Schema::dropIfExists('achivements');
	}
};
