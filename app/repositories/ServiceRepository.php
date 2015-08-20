<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\Pet;
use App\Libraries\Helpers\Helper;

class ServiceRepository
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
     * Get all pet
     *
     * @return json
     */
    public function getAllPets()
    {
        return Pet::all();
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

    /**
     * Changing status of the service
     *
     * @param int $id
     * @param int $status
     */
    public function changeServiceStatus($id, $status, $isAjax)
    {
        $response = array('valid' => 0, 'str' => 'Some error to change the status');
        $service = $this->getServiceById($id);
        $service->status = ($status) ? 0 : 1;
        $response = $service->save();
        if ($isAjax && $response) {
            $result['valid'] = 1;
            $result['str'] = Helper::formatMessage("Service status has been changed.", 'success');
            $response = $result;
        }

        return $response;
    }

    /**
     * Deleting Service
     *
     * @param int $id     
     * @return Array
     */
    public function removeService($id)
    {
        $response = array('valid' => 0, 'str' => 'Some error to delete');
        $service = $this->getServiceById($id);
        $service->delete();

        $response['valid'] = 1;
        $response['str'] = Helper::formatMessage("Service deleted successfully", 'success');

        return $response;
    }

    /**
     * Store service into database
     *
     * @param array $input
     * @return boolean
     */
    public function createService($input)
    {
        $result = Service::validate($input);
        if (!is_bool($result)) {
            return $this->setMessage($result);
        }

        $service = new Service();
        $service->service_name = $input['name'];
        $service->description = $input['description'];
        $service->save();

        return $result;
    }

}
