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
			$table->foreignId('recruitment_id')->constrained('recruitments');
			$table->text('date');
			$table->text('title');
			$table->enum('achivement',['1st winner', '2nd winner', '3rd winner', 'finalist']);
			$table->enum('level',['regional', 'national', 'international']);
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
