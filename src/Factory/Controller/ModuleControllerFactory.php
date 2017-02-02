<?php

namespace CdiGenerator\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class NamespacesControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL) {

       
        /* @var $grid \CdiDataGrid\Grid */
        $grid = $container->build("CdiDatagridDoctrine", ["customOptionsKey" => "CdiGenerator_Module"]);
      
        
        $em = $container->get('doctrine.entitymanager.orm_cdigenerator');
        return new \CdiGenerator\Controller\ModuleController($em, $grid);
    }

}
