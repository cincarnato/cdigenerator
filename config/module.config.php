<?php

namespace CdiGenerator;

/**
* @author Cristian Incarnato <cristian.cdi@gmail.com>
*/

$setting = array_merge(
        include 'items/controller.config.php', 
        include 'items/doctrine.config.php', 
        include 'items/navigation.config.php', 
        include 'items/options.config.php', 
        include 'items/rbac.config.php', 
        include 'items/route.config.php', 
        include 'items/view.config.php',
        include 'cdi-datagrid-custom.config.php'
);

return $setting;
