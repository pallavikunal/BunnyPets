<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator as Validator;
use App\Repositories\ServiceRepository;

class Pet extends \Eloquent
{

    /**
     * Guarded fields which are not mass fillable
     *
     * @var array
     */
    protected $guarded = array('id');

    /**
     * Name of the table used
     *
     * @var string
     */
    protected $table = 'pet_type';

    /**
     * Relationship for one to many
     *
     */
    public function service()
    {
        return $this->hasMany('App\Models\PetService', 'pet_type_id');
    }

    /**
     * Validating input.
     *
     * @param array $input
     * @return mixed (boolean | array)
     */
    public static function validate($input, $id = null)
    {
        $rules = array(
            'name' => array('required', 'min:2', 'max:100', 'regex:/[a-zA-z ]/'),
            'description' => 'required|Min:2'
        );
        $validation = Validator::make($input, $rules);

        return ($validation->passes()) ? true : $validation->messages();
    }

}
