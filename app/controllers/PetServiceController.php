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

class PetServiceController extends \BaseController implements AjaxInterface
{

    /**
     * @var object
     *
     */
    private $service;

    /**
     *
     * @param \App\Repositories\ServiceRepository $service
     */
    public function __construct(ServiceRepository $service)
    {
        Session::set('parent_menu', '');
        $this->service = $service;
        $this->initializeAjax();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null)
    {
        $services = $this->service->getAllServices($id);
        Session::set('sub_menu', 'service_index');

        return View::make('admin.service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        
        if (!is_bool($this->service->createService(Input::all()))) {
            return Redirect::back()->withInput()->withErrors($this->service->getMessage());
        }

        return Redirect::route('service.index')
                        ->with('message', Helper::formatMessage("Service Added successfully!", 'success'));
    }

    /**
     * Changing status of the record
     *
     * @param array $params
     * @return Array
     */
    public function onChangeStatus(array $params)
    {
        return $this->service->changeServiceStatus($params['id'], $params['status'], true);
    }

    /**
     * Remove service as per the request
     *
     * @param array $params
     * @return json
     */
    public function onDelete(array $params)
    {
        return $this->service->removeService($params['id']);
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
