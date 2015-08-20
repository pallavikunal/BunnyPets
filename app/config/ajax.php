<?php

return array(
    'service_change_status' => array(
        'controller' => 'App\Controllers\ServiceController',
        'repository' => 'App\Repositories\ServiceRepository',
        'action' => 'onChangeStatus'
    ),
    'service_delete' => array(
        'controller' => 'App\Controllers\ServiceController',
        'repository' => 'App\Repositories\ServiceRepository',
        'action' => 'onDelete'
    ),
    'pet_change_status' => array(
        'controller' => 'App\Controllers\PetController',
        'repository' => 'App\Repositories\PetRepository',
        'action' => 'onChangeStatus'
    ),
    'pet_delete' => array(
        'controller' => 'App\Controllers\PetController',
        'repository' => 'App\Repositories\PetRepository',
        'action' => 'onDelete'
    ),
);
