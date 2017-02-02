<?php

namespace CdiGenerator\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="module")
 *
 * @author Cristian Incarnato
 */
class Module extends \CdiGenerator\Entity\BaseEntity {

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Annotation\Type("Zend\Form\Element\Hidden")
     */
    protected $id;

    /**
     * @var string
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Name:"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":100}})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true, name="name")
     */
    protected $name;

    /**
     * @var string
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Prefix:"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":15}})
     * @ORM\Column(type="string", length=15, unique=false, nullable=true, name="prefix")
     */
    protected $prefix;

    /**
     * @var string
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Relative Path:"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":100}})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true, name="path")
     */
    protected $path;

    /**
     * @var 
     * @ORM\OneToMany(targetEntity="CdiGenerator\Entity\Entity", mappedBy="module")
     */
    protected $entities;

    /**
     * @var 
     * @ORM\OneToMany(targetEntity="CdiGenerator\Entity\Controllers", mappedBy="module")
     */
    protected $controllers;

    public function __construct() {
        $this->entities = new ArrayCollection();
        $this->controllers = new ArrayCollection();
    }
    function getControllers() {
        return $this->controllers;
    }

    function setControllers($controllers) {
        $this->controllers = $controllers;
    }

    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getPath() {
        return $this->path;
    }

    function getEntities() {
        return $this->entities;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setEntities($entities) {
        $this->entities = $entities;
    }

    public function __toString() {
        return $this->name;
    }

    function getPrefix() {
        return $this->prefix;
    }

    function setPrefix($prefix) {
        $this->prefix = $prefix;
    }

}
