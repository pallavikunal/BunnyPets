<?php

namespace App\Controllers;

use View;
use Input;
use Cache;
use Session;
use Response;
use Redirect;
use App\Libraries\Helpers\Helper;
use App\Libraries\Helpers\AjaxHelper;
use App\Libraries\Interfaces\AjaxInterface;
use App\Repositories\PetRepository;

class PetController extends \BaseController implements AjaxInterface
{

    /**
     * @var object
     *
     */
    private $pet;

    /**
     *
     * @param \App\Repositories\ServiceRepository $pet
     */
    public function __construct(PetRepository $pet)
    {
        Session::set('parent_menu', '');
        $this->pet = $pet;
        $this->initializeAjax();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null)
    {
        $pets = $this->pet->getAllPets($id);
        $services = $this->pet->getAllServices($id);
        Session::set('sub_menu', 'service_index');

        return View::make('admin.pet.index', ['pets' => $pets, 'services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $services = $this->pet->getAllServices();
        return View::make('admin.pet.create', [ 'services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (!is_bool($this->pet->createPet(Input::all()))) {
            return Redirect::back()->withInput()->withErrors($this->pet->getMessage());
        }

        return Redirect::route('pet.index')
                        ->with('message', Helper::formatMessage("Pet Added successfully!", 'success'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function edit($id)
    {
        $serArr = array();
        $pet = $this->pet->getPetById($id);
        $services = $this->pet->getAllServices();
        $petServices = $this->pet->getIdPetServiceById($id);        
        foreach ($petServices as $key => $service) {
            $serArr[] = $service['pet_service_id'];
        }
        
        return View::make('admin.pet.edit', [ 'pet' => $pet, 'services' => $services, 'petServices' => $serArr]);
    }

    /**
     *  Update the specified resource in storage.
     *
     * @param INT $id
     * @return Response
     */
    public function update($id)
    {
        if (!is_bool($this->pet->updatePet(Input::all(), $id))) {
            return Redirect::back()->withInput()->withErrors($this->pet->getMessage());
        }

        return Redirect::route('pet.index')
                        ->with('message', Helper::formatMessage("Record Updated successfully", 'success'));
    }

    /**
     * Changing status of the record
     *
     * @param array $params
     * @return Array
     */
    public function onChangeStatus(array $params)
    {
        return $this->pet->changeServiceStatus($params['id'], $params['status'], true);
    }

    /**
     * Remove service as per the request
     *
     * @param array $params
     * @return json
     */
    public function onDelete(array $params)
    {
        return $this->pet->removePet($params['id']);
    }

    /**
     * Initializing ajax methods
     *
     */
    public function initializeAjax()
    {
        if (!Cache::has('service_change_status') && !Cache::has('service_delete')) {
            $ajaxParam = array(
                'service_status' => array(
                    'controller' => get_class($this),
                    'repository' => get_class($this->service),
                    'action' => 'onChangeStatus'
                ),
                'service_delete' => array(
                    'controller' => get_class($this),
                    'repository' => get_class($this->service),
                    'action' => 'onDelete'
                ),
            );
            AjaxHelper::setAjaxInfo('service_change_status', $ajaxParam['service_status']);
            AjaxHelper::setAjaxInfo('service_delete', $ajaxParam['service_delete']);
        }
    }

}
