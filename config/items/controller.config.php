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
        ],
    ]
);
