<?php
namespace CdiGenerator;

/**
* @author Cristian Incarnato <cristian.cdi@gmail.com>
*/

return [
    'zfc_rbac' => [
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                'centity' => ['admin'],
                'cproperty' => ['admin'],
                'cnamespaces' => ['admin'],
                'cmain' => ['admin'],
                'ccontroller' => ['admin'],
                'cmenu*' => ['admin'],
                'cdi_entity_editor' => ['admin'],
                'cdi_entity_otm' => ['admin'],
            ]
        ],
    ]
];
