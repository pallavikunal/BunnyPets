<?php

/*
  |--------------------------------------------------------------------------
  | View Factory Class
  |--------------------------------------------------------------------------
  |
  | This factory class will return view according to the type of search
  |
 */

namespace App\Libraries\Helpers;

use View;

class ViewFactory
{

    private static $_types = array('region','category','details');
    
    /**
     * 
     * @param string $type
     * @return boolean
     */
    public static function getView($type,$viewPrefix = null)
    {
        return View::make($viewPrefix.".".$type);
    }
    
    /**
     * Checking is type exists
     * 
     * @param string $type
     * @return boolean
     */
    private static function isTypeExists($type)
    {
        return in_array($type, self::$_types);
    }

}
