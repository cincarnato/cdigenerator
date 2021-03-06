<?php

namespace CdiGenerator\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class MainController extends AbstractActionController {

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

    public function setEntityManager(EntityManager $em) {
        $this->em = $em;
    }

    public function getEntityManager() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
    
    public function indexAction() {
        
        return [];
    }


}
