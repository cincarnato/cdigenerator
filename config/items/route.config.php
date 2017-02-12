<?php

namespace CdiGenerator;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return [
    'router' => array(
        'routes' => array(
            'CdiGenerator_Main' => array(
                'type' => Literal::class,
                'may_terminate' => true,
                'options' => array(
                    'route' => '/generator',
                    'defaults' => array(
                        'controller' => Controller\MainController::class,
                        'action' => 'index',
                    ),
                ),
                'child_routes' => [
                    'Module' => array(
                        'type' => Literal::class,
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/module',
                            'defaults' => array(
                                'controller' => Controller\ModuleController::class,
                                'action' => 'index',
                            ),
                        ),
                        'child_routes' => [
                            'Manage' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => '/manage/:moduleId',
                                    'defaults' => array(
                                        'controller' => Controller\ModuleController::class,
                                        'action' => 'manage',
                                    ),
                                ),
                            ),
                            'Entity' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => '/entity/:moduleId',
                                    'defaults' => array(
                                        'controller' => Controller\EntityController::class,
                                        'action' => 'module',
                                    ),
                                ),
                            ),
                            'Entity_Property' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => '/entity/property/:entityId',
                                    'defaults' => array(
                                        'controller' => Controller\PropertyController::class,
                                        'action' => 'entity',
                                    ),
                                ),
                            ),
                            'Entity_Generator' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => '/entity/generator/:entityId',
                                    'defaults' => array(
                                        'controller' => Controller\EntityController::class,
                                        'action' => 'generator',
                                    ),
                                ),
                            ),
                        ]
                    ),
                ],
            ),
        ),
    ),
];
