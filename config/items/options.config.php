<?php

namespace CdiGenerator;

/**
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
return [
    'generator_options' => array(
        'author' => "Generator",
        'license' => "",
        'script_update_schema' => __DIR__.'/../../bin/doctrine-module orm:schema-tool:update --force',
    ),
];
