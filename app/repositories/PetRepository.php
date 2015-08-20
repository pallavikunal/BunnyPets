<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Models\Service;
use App\Models\PetService;
use App\Libraries\Helpers\Helper;

class PetRepository
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
     * Get all pet
     *
     * @return json
     */
    public function getAllPets()
    {
        return Pet::all();
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
     * Get pet by ID
     *
     * @return json
     */
    public function getPetById($id)
    {
        return Pet::find($id);
    }

    /**
     * Changing status of the pet
     *
     * @param int $id
     * @param int $status
     */
    public function changePetStatus($id, $status, $isAjax)
    {
        $response = array('valid' => 0, 'str' => 'Some error to change the status');
        $pet = $this->getPetById($id);
        $pet->status = ($status) ? 0 : 1;
        $response = $pet->save();
        if ($isAjax && $response) {
            $result['valid'] = 1;
            $result['str'] = Helper::formatMessage("pet status has been changed.", 'success');
            $response = $result;
        }

        return $response;
    }

    /**
     * Deleting pet
     *
     * @param int $id     
     * @return Array
     */
    public function removePet($id)
    {
        $response = array('valid' => 0, 'str' => 'Some error to delete');
        $pet = $this->getPetById($id);
        $pet->delete();

        $response['valid'] = 1;
        $response['str'] = Helper::formatMessage("Pet deleted successfully", 'success');

        return $response;
    }

    /**
     * Store pet into database
     *
     * @param array $input
     * @return boolean
     */
    public function createPet($input)
    {
        $result = Pet::validate($input);
        if (!is_bool($result)) {
            return $this->setMessage($result);
        }

        $pet = new Pet();
        $pet->pet_name = $input['name'];
        $pet->description = $input['description'];
        $pet->save();

        return $result;
    }

    /**
     * Store pet into database
     *
     * @param array $input
     * @return boolean
     */
    public function updatePet($input, $id)
    {
        $this->deleteServiceByPetId($id);        

        if (is_array($input['service'])) {
            foreach ($input['service'] as $key => $service) {
                $petService = new PetService();
                $petService->pet_type_id = $id;
                $petService->pet_service_id = $service;
                $petService->save();
            }
        }
        return TRUE;
    }

    /**
     * Deleting pet
     *
     * @param int $id     
     * @return Array
     */
    public function deleteServiceByPetId($id)
    {
        $petServices = $this->getIdPetServiceById($id);
        foreach ($petServices as $key => $petService) {            
            $petService = $this->getPetServiceById($petService->id);
            $petService->delete();
        }               
    }

    /**
     * get pet
     *
     * @param int $id     
     * @return Array
     */
    public function getIdPetServiceById($id)
    {
       return PetService::where('pet_type_id', $id)->get();

    }
    
    /**
     * Get pet by ID
     *
     * @return json
     */
    public function getPetServiceById($id)
    {
        return PetService::find($id);
    }

}
