<?php

namespace CdiGenerator\Generator;

/**
 * Description of ModuleGenerator
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class ModuleGenerator {
   
    /**
     * Description
     * 
     * @var \CdiGenerator\Entity\Module
     */
    private $module;
    
    function __construct(\CdiGenerator\Entity\Module $module) {
        $this->module = $module;
    }

    
    function getModule() {
        return $this->module;
    }

    function setModule(\CdiGenerator\Entity\Module $module) {
        $this->module = $module;
    }




}
