<?php

namespace CdiGenerator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ActionController extends AbstractActionController {

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * Description
     * 
     * @var \CdiDataGrid\Grid 
     */
    protected $grid;

    function __construct(\Doctrine\ORM\EntityManager $em, \CdiDataGrid\Grid $grid) {
        $this->em = $em;
        $this->grid = $grid;
    }

    function getEm() {
        return $this->em;
    }

    function setEm(Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function setEntityManager(EntityManager $em) {
        $this->em = $em;
    }

    public function getEntityManager() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

    public function controllerAction() {

        //Limitamos las Entity al module correspondiente

        $controllerId = $this->params("controllerId");
        $controller = $this->getEm()->getRepository("CdiGenerator\Entity\Entity")->find($controllerId);

        $query = $this->getEm()->createQueryBuilder()
                ->select('u')
                ->from('CdiGenerator\Entity\Action', 'u')
                ->where("u.controller = :controllerId")
                ->setParameter("controllerId", $controllerId);
        $source = new \CdiDataGrid\Source\DoctrineSource($this->getEm(), "CdiGenerator\Entity\Action", $query);
        $this->grid->setSource($source);

        ##################################################
        $this->grid->setRecordsPerPage(100);
        $this->grid->setTableClass("table-condensed");
        $this->grid->prepare();

        $this->grid->getFormFilters()->remove("controller");

        if ($this->request->getPost("crudAction") == "edit" || $this->request->getPost("crudAction") == "add" || $this->request->getPost("crudAction") == "editSubmit" || $this->request->getPost("crudAction") == "addSubmit") {
            $this->grid->getCrudForm()->remove("controller");
            $hidden = new \Zend\Form\Element\Hidden("controller");
            $hidden->setValue($controllerId);
            $this->grid->getCrudForm()->add($hidden);
        }


        $view = new ViewModel(array('grid' => $this->grid));
        $view->setTerminal(true);
        return $view;
    }

}
