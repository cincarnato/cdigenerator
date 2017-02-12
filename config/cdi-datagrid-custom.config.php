<?php

$setting = array_merge(
        include 'cdi-datagrid-custom/cdidatagrid.config.php',
        include 'cdi-datagrid-custom/module.cdigrid.config.php', 
        include 'cdi-datagrid-custom/entity.cdigrid.config.php', 
        include 'cdi-datagrid-custom/property.cdigrid.config.php'
);

return $setting;
