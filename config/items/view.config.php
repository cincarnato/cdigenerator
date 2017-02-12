<?php

namespace CdiGenerator;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return [
    'view_helpers' => array(
        'invokables' => array(
            'CustomEntityLink' => 'CdiGenerator\View\Helper\CustomEntityLink',
            'EntityToArray' => 'CdiGenerator\View\Helper\EntityToArray',
            'CdiGeneratorRenderEditor' => 'CdiGenerator\View\Helper\CdiGeneratorRenderEditor',
            'CdiGeneratorRenderForm' => 'CdiGenerator\View\Helper\CdiGeneratorRenderForm',
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'cdigenerator' => __DIR__ . '/../../view',
        ),
    ),
    ];
