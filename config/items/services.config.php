<?php

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return [
    'service_manager' => [
        'factories' => [
            'doctrine.entitymanager.orm_cdigenerator' => new \DoctrineORMModule\Service\EntityManagerFactory('orm_cdigenerator'),
        ],
    ]
];


