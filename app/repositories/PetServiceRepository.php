<?php

namespace App\Repositories;

use App\Models\Service;
use App\Libraries\Helpers\Helper;

class PetServiceRepository
{

    /**
     *
     * Setting error or success message
     */
    protected $message;

    /**
     *
     * @var array
     */
    protected $dimensions = array('small' => array('225X225', '150X133'), 'big' => array('748X340'));

    /**
     *
     * Get message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     *
     * Set message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get all service
     *
     * @return json
     */
    public function getAllServices()
    {
        return Service::all();
    }

    /**
     * Get service by ID
     *
     * @return json
     */
    public function getServiceById($id)
    {
        return Service::find($id);
    }  

}
