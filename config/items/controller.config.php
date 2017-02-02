<?php
namespace CdiGenerator;

/**
* @author Cristian Incarnato <cristian.cdi@gmail.com>
*/


return array(
    'factories' => [
        \CdiGenerator\Controller\NamespacesController::class => \CdiGenerator\Factory\Controller\NamespacesControllerFactory::class,
        \CdiGenerator\Controller\EntityController::class => \CdiGenerator\Factory\Controller\EntityControllerFactory::class,
        \CdiGenerator\Controller\PropertyController::class => \CdiGenerator\Factory\Controller\PropertyControllerFactory::class,
        \CdiGenerator\Controller\MainController::class => \CdiGenerator\Factory\Controller\MainControllerFactory::class,
        \CdiGenerator\Controller\MenuController::class => \CdiGenerator\Factory\Controller\MenuControllerFactory::class,
        \CdiGenerator\Controller\ControllerController::class => \CdiGenerator\Factory\Controller\ControllerControllerFactory::class,
        \CdiGenerator\Controller\EditorController::class => \CdiGenerator\Factory\Controller\EditorControllerFactory::class,
        \CdiGenerator\Controller\OtmController::class => \CdiGenerator\Factory\Controller\OtmControllerFactory::class,
    ],
);
