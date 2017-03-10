<?php

namespace CdiGenerator;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return array(
    'controllers' => [
        'factories' => [
            \CdiGenerator\Controller\MainController::class => \CdiGenerator\Factory\Controller\MainControllerFactory::class,
            \CdiGenerator\Controller\ModuleController::class => \CdiGenerator\Factory\Controller\ModuleControllerFactory::class,
            \CdiGenerator\Controller\EntityController::class => \CdiGenerator\Factory\Controller\EntityControllerFactory::class,
            \CdiGenerator\Controller\PropertyController::class => \CdiGenerator\Factory\Controller\PropertyControllerFactory::class,
            \CdiGenerator\Controller\AbmController::class => \CdiGenerator\Factory\Controller\AbmControllerFactory::class,
            \CdiGenerator\Controller\GeneratorController::class => \CdiGenerator\Factory\Controller\GeneratorControllerFactory::class,
            \CdiGenerator\Controller\RouteController::class => \CdiGenerator\Factory\Controller\RouteControllerFactory::class,
            \CdiGenerator\Controller\ControllerController::class => \CdiGenerator\Factory\Controller\ControllerControllerFactory::class,
            \CdiGenerator\Controller\ActionController::class => \CdiGenerator\Factory\Controller\ActionControllerFactory::class,
        
            ],
    ]
);
