<?php

namespace App\Controllers;

use Response;
use Input;
use Config;

class AjaxController extends \BaseController
{

    /**
     * this will call appropriates controller's method.
     *
     */
    public function index()
    {
        // getting parameter from request
        $params = Input::all();
        $type = $params['type'];
        // checking which method we want to call from controller
        if (isset($type)) {
            //$data = Cache::get($type);
            $data = Config::get('ajax.' . $type);
            $controller = new $data['controller'](new $data['repository']);
            $result = call_user_func_array(array($controller, $data['action']), array($params));

            return Response::json($result);
        }
    }

}
