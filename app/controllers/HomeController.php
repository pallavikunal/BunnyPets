<?php

use App\Libraries\Interfaces\AjaxInterface;
use App\Libraries\Helpers\AjaxHelper;

class HomeController extends BaseController
{

    /**
     *
     * @var Object
     */
    private $home;

    /**
     *
     * @param \App\Repositories\HomeRepository $home
     */
    public function __construct(HomeRepository $home)
    {
        $this->home = $home;
        $this->initializeAjax();
    }

    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    /**
     * Show home page of application
     *
     * @return View
     */
    public function index()
    {
        return View::make('home');
    }

}