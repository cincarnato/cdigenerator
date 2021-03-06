<?php

namespace CdiGenerator\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class GeneratorController extends AbstractActionController {

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    function getEm() {
        return $this->em;
    }

    function setEm(Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function entityAction() {
        $entityId = $this->params("entityId");
        $entity = $this->getEm()->getRepository("CdiGenerator\Entity\Entity")->find($entityId);

        $entityGenerator = new \CdiGenerator\Generator\EntityGenerator($entity);
        $entityGenerator->setOverwrite(true);
        $entityGenerator->generate();

        $repositoryGenerator = new \CdiGenerator\Generator\RepositoryGenerator($entity);
        $repositoryGenerator->setOverwrite(false);
        $repositoryGenerator->generate();


        $view = new \Zend\View\Model\ViewModel([
            "entityGenerator" => $entityGenerator,
            "repositoryGenerator" => $repositoryGenerator,
            "entity" => $entity]);
        $view->setTerminal(true);
        return $view;
    }

    public function controllerAction() {
        $controllerId = $this->params("controllerId");
        $controller = $this->getEm()->getRepository("CdiGenerator\Entity\Controller")->find($controllerId);

        $controllerGenerator = new \CdiGenerator\Generator\ControllerGenerator($controller);
        $controllerGenerator->setOverwrite(true);
        $controllerGenerator->generate();


        $controllerFactoryGenerator = new \CdiGenerator\Generator\ControllerFactoryGenerator($controller);
        $controllerFactoryGenerator->setOverwrite(true);
        $controllerFactoryGenerator->generate();

        $view = new \Zend\View\Model\ViewModel([
            "controllerGenerator" => $controllerGenerator,
            "controllerFactoryGenerator" => $controllerFactoryGenerator,
            "controller" => $controller]);
        $view->setTerminal(true);
        return $view;
    }

}
