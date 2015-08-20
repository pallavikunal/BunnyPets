<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetService extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services_for_pets', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('pet_type_id', 100)->unique();
            $table->string('pet_service_id', 100)->unique();            
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
		Schema::drop('services_for_pets');
	}

}
