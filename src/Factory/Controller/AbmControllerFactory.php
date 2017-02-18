<?php

namespace CdiGenerator\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AbmControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL) {

        $id = $container->get('Application')->getMvcEvent()->getRouteMatch()->getParam('id', false);

        $emG = $container->get('doctrine.entitymanager.orm_cdigenerator');

        $query = $emG->createQueryBuilder()
                ->select('u')
                ->from('CdiGenerator\Entity\Entity', 'u')
                ->where("u.id = :id")
                ->setParameter("id", $id);
        $entity = $query->getQuery()->getOneOrNullResult();

        $fullName = str_replace('\\', "_", $entity->getFullname());

        /* @var $grid \CdiDataGrid\Grid */
        $grid = $container->build("CdiDatagridDoctrine", ["customOptionsKey" => $fullName]);
        $grid->setTemplate("ajax");
        $grid->setId("CdiGrid_" . $fullName);
        $em = $container->get('doctrine.entitymanager.orm_default');
        return new \CdiGenerator\Controller\AbmController($em, $grid);
    }

}
