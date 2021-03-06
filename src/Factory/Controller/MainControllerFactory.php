<?php

namespace CdiGenerator\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MainControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL) {

        
        $em = $container->get('doctrine.entitymanager.orm_cdigenerator');
        return new \CdiGenerator\Controller\MainController($em);
    }

}
