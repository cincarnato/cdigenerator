<?php
namespace CdiGenerator;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */

return [
    'router' => array(
        'routes' => array(
            'ccontroller_factory_config' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/cdientity/controller/update-factory-config',
                    'defaults' => array(
                        'controller' => Controller\ControllerController::class,
                        'action' => 'update-factory-config',
                    ),
                ),
            ),
            'ccontroller' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cdientity/controller/:action[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\ControllerController::class,
                        'action' => 'abm',
                    ),
                ),
            ),
            'cmenu' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/cdientity/menu/abm',
                    'defaults' => array(
                        'controller' => Controller\MenuController::class,
                        'action' => 'abm',
                    ),
                ),
            ),
            'cmenuupdate' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/cdientity/menu/update',
                    'defaults' => array(
                        'controller' => Controller\MenuController::class,
                        'action' => 'update',
                    ),
                ),
            ),
            'centity' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cdientity/entity/:action[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\EntityController::class,
                        'action' => 'abm',
                    ),
                ),
            ),
            'cproperty' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cdientity/property/:action[/:id][/:eid][/:rid]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\PropertyController::class,
                        'action' => 'abm',
                    ),
                ),
            ),
            'cnamespaces' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cdientity/namespaces/:action[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\NamespacesController::class,
                        'action' => 'abm',
                    ),
                ),
            ),
            'cmain' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cdientity/main[/:action][/:id][/:eid][/:rid]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\MainController::class,
                        'action' => 'abm',
                    ),
                ),
            ),
            'cdi_entity_editor' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cdientity/editor/:action/:entityId[/:objectId]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'eid' => '[0-9]+',
                        'oid' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\EditorController::class,
                        'action' => 'editor',
                    ),
                ),
            ),
            'cdi_entity_otm' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cdientity/otm/:action/:entityId/:parentEntityId/:parentObjectId',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'entityId' => '[0-9]+',
                        'parentEntityId' => '[0-9]+',
                        'parentObjectId' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\OtmController::class,
                        'action' => 'ajax',
                    ),
                ),
            ),
        ),
    ),
];
