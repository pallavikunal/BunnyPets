<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PetTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('pet_type')->delete();
        $data = array(
            array('pet_name' => "Cats", 'description' => "Cats details"),
            array('pet_name' => "Dogs", 'description' => "Dogs details"),
            array('pet_name' => "Rabbits", 'description' => "Rabbits details"),
            array('pet_name' => "Tortoises", 'description' => "Tortoises details"),
            array('pet_name' => "pet snakes", 'description' => "pet snakes details")
        );
        DB::table('pet_type')->insert($data);
    }
}
