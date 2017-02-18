<?php

namespace CdiGenerator\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class GeneratorControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL) {     
        $em = $container->get('doctrine.entitymanager.orm_cdigenerator');
        return new \CdiGenerator\Controller\GeneratorController($em);
    }

}
