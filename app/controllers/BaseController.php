<?php

use App\Repositories\HomeRepository;

class BaseController extends Controller
{

    /**
     *
     * @var Object
     */
    protected $meta = array();

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function index()
    {

    }

}