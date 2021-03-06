<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_type', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('pet_name', 100)->unique();
            $table->text('description');            
            $table->tinyInteger('status')->default(1)->length(2)->unsigned();
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
		Schema::drop('pet_type');
	}

}
