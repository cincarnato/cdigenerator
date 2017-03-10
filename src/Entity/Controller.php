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
     * @ORM\Column(type="string", length=100, unique=true, nullable=false, name="name")
     */
    protected $name;
    
        
      /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({
     * "label":"Entity:",
     * "empty_option": "",
     * "target_class":"CdiGenerator\Entity\Entity",
     * "property": "name"})
     * @ORM\ManyToOne(targetEntity="CdiGenerator\Entity\Entity")
     * @ORM\JoinColumn(name="entity_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $entity;
    
        /**
     * @var string
     * @Annotation\Type("Zend\Form\Element\Textarea")
     * @Annotation\Options({"label":"Description:"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":300}})
     * @ORM\Column(type="string", length=300, unique=false, nullable=true, name="description")
     */
    protected $description;

    
    
        /**
     * @var 
     * @ORM\OneToMany(targetEntity="CdiGenerator\Entity\Action", mappedBy="controller")
     */
    protected $actions;

    public function __construct() {
        $this->actions = new ArrayCollection();
    }
    
    function getEntity() {
        return $this->entity;
    }

    function setEntity($entity) {
        $this->entity = $entity;
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
    
    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }




    
}
