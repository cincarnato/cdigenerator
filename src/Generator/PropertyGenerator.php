<?php

namespace CdiGenerator\Generator;

/**
 * Description of PropertyGenerator
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class PropertyGenerator {

    /**
     * Description
     * 
     * @var \CdiGenerator\Entity\Property
     */
    protected $property;

    /**
     * Description
     * 
     * @var \CdiGenerator\Entity\Property
     */
    protected $propertyGenerator;

    /**
     * Description
     * 
     * @var \Zend\Code\Generator\ClassGenerator
     */
    protected $classGenerator;

    function getPropertyGenerator() {
        return $this->propertyGenerator;
    }

    function setPropertyGenerator(\CdiGenerator\Entity\Property $propertyGenerator) {
        $this->propertyGenerator = $propertyGenerator;
    }

    function getClassGenerator() {
        return $this->classGenerator;
    }

    function setClassGenerator(\Zend\Code\Generator\ClassGenerator $classGenerator) {
        $this->classGenerator = $classGenerator;
    }

    function getProperty() {
        return $this->property;
    }

    function setProperty(\CdiGenerator\Entity\Property $property) {
        $this->property = $property;
    }

    /**
     * Description
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @param \Zend\Code\Generator\ClassGenerator $classGenerator
     */
    static function generate(\CdiGenerator\Entity\Property $property, \Zend\Code\Generator\ClassGenerator $classGenerator) {

        //INIT
        $this->property = $property;
        $this->propertyGenerator = new \Zend\Code\Generator\PropertyGenerator();
        $this->classGenerator = $classGenerator;

        //Check Related Entity on Type = oneToOne, manyToOne, oneToMany, manyToMany
        $this->checkRelatedEntity();

        //Set Property name
        $this->getPropertyGenerator()->setName($this->getProperty()->getName());

        //Annotations of Property
        $this->generateAnnotation();

        //Add PropertyGenerator to Entity Class Generator
        $this->getClassGenerator()->addPropertyFromGenerator($this->getPropertyGenerator());

        //Generate Getter Method of property and ADD to Entity Class
        $this->generateGetter();

        //Generate Setter Method of property and ADD to Entity Class
        $this->generateSetter();


        //Metodos auxiliares para File
        if ($this->getProperty()->getType() == "file") {
            $this->generateFileMethods();
        }
    }

    protected function generateAnnotation() {
        /* @var $annotations \Zend\Code\Generator\DocBlockGenerator */
        $annotations = new \Zend\Code\Generator\DocBlockGenerator();


        $tagForm = null;

        //CHECK IF PROPERTY NEED EXLUDE
        if ($this->getProperty()->getExclude()) {
            $tagForm = \CdiGenerator\FormAnnotation::EXCLUDE();
            //CHECK IF PROPERTY NEED HIDDEN    
        } else if ($this->getProperty()->getHidden()) {
            $tagForm = \CdiGenerator\FormAnnotation::HIDDEN();
        }

        switch ($this->getProperty()->getType()) {
            case "string":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::TEXT($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::STRING($this->getProperty());
                break;

            case "stringarea":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::TEXTAREA($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::STRING($this->getProperty());
                break;

            case "text":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::TEXTAREA($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::TEXT($this->getProperty());
                break;
            case "integer":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::TEXT($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::INTEGER($this->getProperty());
                break;

            case "decimal":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::TEXT($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::DECIMAL($this->getProperty());
                break;

            case "date":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::TEXT($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::DATE($this->getProperty());
                break;

            case "datetime":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::TEXT($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::DATETIME($this->getProperty());
                break;

            case "time":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::TEXT($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::TIME($this->getProperty());
                break;

            case "boolean":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::CHECKBOX($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::BOOLEAN($this->getProperty());
                break;

            case "file":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::FILE($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::STRING($this->getProperty());
                break;

            case "oneToOne":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::OBJECTSELECT($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::ONETOONE($this->getProperty());
                break;

            case "manyToOne":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::OBJECTSELECT($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::MANYTOONE($this->getProperty());
                break;

            case "oneToMany":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::OBJECTMULTICHECKBOX($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::ONETOMANY($this->getProperty());
                break;
            case "manyToMany":
                $tagForm = ($tagForm) ? $tagForm : \CdiGenerator\FormAnnotation::OBJECTMULTICHECKBOX($this->getProperty());
                $tagDoctrine = \CdiGenerator\DoctrineAnnotation::MANYTOMANY($this->getProperty());
                break;

            default:
        }


        $tags = array_merge_recursive($tagForm, $tagDoctrine);

        $annotations->setTags($tags);

        $this->getPropertyGenerator()->setDocBlock($annotations);
    }

    /**
     * Generate Getter Method of property and ADD to Entity Class
     */
    protected function generateGetter() {
        $m = new \Zend\Code\Generator\MethodGenerator();
        $m->setName("get" . ucfirst($this->getProperty()->getName()));
        $m->setBody('return $this->' . $this->getProperty()->getName() . ";");
        $this->getClassGenerator()->addMethodFromGenerator($m);
    }

    /**
     * Generate Setter Method of property and ADD to Entity Class
     */
    protected function generateSetter() {
        $parameter = new \Zend\Code\Generator\ParameterGenerator($this->getProperty()->getName(), $this->getProperty()->getType());
        $m = new \Zend\Code\Generator\MethodGenerator ( );
        $m->setName("set" . ucfirst($this->getProperty()->getName()));
        $m->setBody('$this->' . $this->getProperty()->getName() . " = $" . $this->getProperty()->getName() . ";");
        $m->setParameter($parameter);
        $this->getClassGenerator()->addMethodFromGenerator($m);
    }

    /**
     * Check Related Entity on Type = oneToOne, manyToOne, oneToMany, manyToMany
     */
    protected function checkRelatedEntity() {
        if (($this->getProperty()->getType() == "oneToOne" ||
                $this->getProperty()->getType() == "manyToOne" ||
                $this->getProperty()->getType() == "oneToMany" ||
                $this->getProperty()->getType() == "manyToMany") &&
                $this->getProperty()->getRelatedEntity() == null) {
            throw new Exception("Falta definir RelatedEntity");
        }
    }

    protected function generateFileMethods() {
        $ma = new \Zend\Code\Generator\MethodGenerator ( );
        $method = "get" . ucfirst($this->getProperty()->getName()) . "_ap";
        $ma->setName($method);
        $ma->setBody('return "' . $this->getProperty()->getAbsolutepath() . '";');
        $a[] = $ma;


        $ms = new \Zend\Code\Generator\MethodGenerator ( );
        $method = "get" . ucfirst($this->getProperty()->getName()) . "_wp";
        $ms->setName($method);
        $ms->setBody('return "' . $this->getProperty()->getWebpath() . '";');
        $a[] = $ms;

        $mf = new \Zend\Code\Generator\MethodGenerator ( );
        $method = "get" . ucfirst($this->getProperty()->getName()) . "_fp";
        $mf->setName($method);
        $mf->setBody('return "' . $this->getProperty()->getWebpath() . '".$this->' . $this->getProperty()->getName() . ';');
        $a[] = $mf;

        $this->getClassGenerator()->addMethods($a);
    }

}
