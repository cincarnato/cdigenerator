<?php

namespace CdiGenerator;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Generator',
                'detail' => "",
                'icon' => 'fa fa-sitemap ',
                'permission' => 'cdigenerator',
                'uri' => '',
                "pages" => [
                    [
                        'label' => 'Module',
                        'detail' => "",
                        'icon' => 'fa fa-map-signs ',
                        'permission' => 'cdigenerator.module.edit',
                        'uri' => '/generator/module/',
                    ],
                    [
                        'label' => 'CdiController',
                        'detail' => "",
                        'icon' => 'fa fa-tasks',
                        'permission' => 'cdientity',
                        'uri' => '/cdientity/controller/abm',
                    ],
                    [
                        'label' => 'CdiMenu',
                        'detail' => "",
                        'icon' => 'fa fa-ellipsis-h',
                        'permission' => 'cdientity',
                        'uri' => '/cdientity/menu/abm',
                    ],
                ],
            ],
        ],
    ],
];
