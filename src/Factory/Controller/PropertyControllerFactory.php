<?php

namespace CdiGenerator\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class PropertyControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL) {


        /* @var $grid \CdiDataGrid\Grid */
        $grid = $container->build("CdiDatagridDoctrine", ["customOptionsKey" => "CdiGenerator_Property"]);
        $grid->setTemplate("ajax");
        $grid->setId("CdiGrid_Property");
        $em = $container->get('doctrine.entitymanager.orm_cdigenerator');
        return new \CdiGenerator\Controller\PropertyController($em, $grid);
    }

}
