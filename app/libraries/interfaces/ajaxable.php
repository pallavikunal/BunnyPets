<?php
/*
|@author: Alankar More
|
|20 October 2014
|--------------------------------------------------------------------------
| Ajaxable intefrace which provides method for ajax initialization
|--------------------------------------------------------------------------
|
*/

namespace App\Libraries\Interfaces;

use Cache;

Interface Ajaxable
{

  public function initializeAjax();
}