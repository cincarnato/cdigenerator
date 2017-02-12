<?php

namespace CdiGenerator\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="controller")
 *
 * @author Cristian Incarnato
 */
class Controller extends \CdiGenerator\Entity\AbstractEntity {

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Annotation\Type("Zend\Form\Element\Hidden")
     */
    protected $id;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({
     * "label":"Module:",
     * "empty_option": "",
     * "target_class":"CdiGenerator\Entity\Module",
     * "property": "name"})
     * @ORM\ManyToOne(targetEntity="CdiGenerator\Entity\Module")
     * @ORM\JoinColumn(name="module_id", referencedColumnName="id", nullable=false,onDelete="CASCADE")
     */
    protected $module;

    /**
     * @var string
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Name:"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":100}})
     * @ORM\Column(type="string", length=100, unique=true, nullable=true, name="name")
     */
    protected $name;
    
        /**
     * @var 
     * @ORM\OneToMany(targetEntity="CdiGenerator\Entity\Action", mappedBy="controller")
     */
    protected $actions;

    public function __construct() {
        $this->actions = new ArrayCollection();
    }
    
    function getActions() {
        return $this->actions;
    }

    function setActions($actions) {
        $this->actions = $actions;
    }

        
    function getId() {
        return $this->id;
    }

    function getModule() {
        return $this->module;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setModule($module) {
        $this->module = $module;
    }

    function setName($name) {
        $this->name = $name;
    }


    
}
