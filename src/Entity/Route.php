<?php

namespace CdiGenerator\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="route")
 *
 * @author Cristian Incarnato
 */
class Route extends \CdiGenerator\Entity\AbstractEntity {

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
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({
     * "label":"Route Parent:",
     * "empty_option": "",
     * "target_class":"CdiGenerator\Entity\Route",
     * "property": "label"})
     * @ORM\ManyToOne(targetEntity="CdiGenerator\Entity\Route")
     * @ORM\JoinColumn(name="route_id", referencedColumnName="id",nullable=true)
     */
    protected $parent;

    /**
     * @Annotation\Exclude()
     * @ORM\OneToMany(targetEntity="CdiGenerator\Entity\Route", mappedBy="parent")
     */
    protected $childs;

    /**
     * @var string
     * @Annotation\Options({"label":"Name:", "description": ""})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":100}})
     * @Annotation\Filter({"name": "Zend\Filter\StringTrim"})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true)
     */
    protected $name;


       /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({
     * "label":"Route Type:",
     * "empty_option": "",
     * "target_class":"CdiGenerator\Entity\RouteType",
     * "property": "label"})
     * @ORM\ManyToOne(targetEntity="CdiGenerator\Entity\RouteType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id",nullable=true)
     */
    protected $type;
    
    
        /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({
     * "label":"Controller:",
     * "empty_option": "",
     * "target_class":"CdiGenerator\Entity\Controller",
     * "property": "name"})
     * @ORM\ManyToOne(targetEntity="CdiGenerator\Entity\Controller")
     * @ORM\JoinColumn(name="controller_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $controller;

    
        /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({
     * "label":"Action:",
     * "empty_option": "",
     * "target_class":"CdiGenerator\Entity\Action",
     * "property": "name"})
     * @ORM\ManyToOne(targetEntity="CdiGenerator\Entity\Action")
     * @ORM\JoinColumn(name="action_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $action;
    
    
        /**
     * @var string
     * @Annotation\Options({"label":"Route:", "description": ""})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":500}})
     * @Annotation\Filter({"name": "Zend\Filter\StringTrim"})
     * @ORM\Column(type="string", length=500, unique=false, nullable=true)
     */
    protected $route;


    public function __construct() {
        $this->childs = new ArrayCollection();
    }
    
    function getId() {
        return $this->id;
    }

    function getModule() {
        return $this->module;
    }

    function getParent() {
        return $this->parent;
    }

    function getChilds() {
        return $this->childs;
    }

    function getName() {
        return $this->name;
    }

    function getType() {
        return $this->type;
    }

    function getController() {
        return $this->controller;
    }

    function getAction() {
        return $this->action;
    }

    function getRoute() {
        return $this->route;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setModule($module) {
        $this->module = $module;
    }

    function setParent($parent) {
        $this->parent = $parent;
    }

    function setChilds($childs) {
        $this->childs = $childs;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setController($controller) {
        $this->controller = $controller;
    }

    function setAction($action) {
        $this->action = $action;
    }

    function setRoute($route) {
        $this->route = $route;
    }



   


}
