<?php
/*
|@author: Alankar More
|
|16 October 2014
|--------------------------------------------------------------------------
| Ajax helper which stores users data in cache
|--------------------------------------------------------------------------
| Each helper function will provide some basic functionalities.
|
*/

namespace App\Libraries\Helpers;

use Cache;

class AjaxHelper
{

  /**
  * Duration for cache
  *
  * @param int
  */
  protected static $minutes = 3600;

  /**
  * Setting key and values information in cache.
  *
  * @throw Exception
  */
  public static function setAjaxInfo($key, array $array)
  {
      if(Cache::has($key)) {
          throw new \Exception($key." Already present in cache");
      }

      Cache::forever($key, $array);
  }
}
