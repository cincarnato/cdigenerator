<?php

namespace CdiGenerator;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return [
    'router' => array(
        'routes' => array(
            'CdiGenerator_Main' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/generator/',
                    'defaults' => array(
                        'controller' => Controller\MainController::class,
                        'action' => 'index',
                    ),
                ),
            ),
            'CdiGenerator_Module' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/generator/module/',
                    'defaults' => array(
                        'controller' => Controller\ModuleController::class,
                        'action' => 'index',
                    ),
                ),
            ),
              'CdiGenerator_Module_Manage' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/generator/module/manage/:moduleId',
                    'defaults' => array(
                        'controller' => Controller\ModuleController::class,
                        'action' => 'manage',
                    ),
                ),
            ),
             'CdiGenerator_Module_Entity' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/generator/module/entity/:moduleId',
                    'defaults' => array(
                        'controller' => Controller\EntityController::class,
                        'action' => 'module',
                    ),
                ),
            ),
             'CdiGenerator_Module_Entity_Property' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/generator/module/entity/property/:entityId',
                    'defaults' => array(
                        'controller' => Controller\PropertyController::class,
                        'action' => 'entity',
                    ),
                ),
            ),
        ),
    ),
];
