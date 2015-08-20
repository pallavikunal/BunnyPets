<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ServiceNameSeeder extends Seeder {

	public function run()
	{
        DB::table('pet_service_types')->delete();
        $data = array(
        	array('service_name' => "Washing",'description' => "Washing service"),
        	array('service_name' => "Shampooing",'description' => "Shampooing service"),
            array('service_name' => "Pedicure",'description' => "Pedicure service"),
            array('service_name' => "Manicure",'description' => "Manicure service"),
        	array('service_name' => "Polishing",'description' => "Polishing service")
        );        
        DB::table('pet_service_types')->insert( $data );
	}

}