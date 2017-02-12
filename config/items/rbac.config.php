<?php

namespace CdiGenerator;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return [
    'zfc_rbac' => [
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                'cdigenerator_*' => ['sysadmin'],
            ],
        ]
    ]
];
