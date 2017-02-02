<?php

namespace CdiGenerator;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return [
    'cdientity_options' => array(
        'script_update_schema' => __DIR__.'/../../bin/doctrine-module orm:schema-tool:update --force',
        'autoupdate' => false
    ),
];
