<?php

namespace CdiGenerator\Generator;

/**
 * EntityGenerator
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class EntityGenerator {

    /**
     * Description
     * 
     * @var \CdiGenerator\Entity\Entity
     */
    private $entity;

    /**
     * Description
     * 
     * @var \Zend\Code\Generator\ClassGenerator
     */
    private $classGenerator;

    /**
     * Description
     * 
     * @var \Zend\Code\Generator\FileGenerator
     */
    private $file;

    /**
     * Status
     * 
     * @var string
     */
    private $status;

    /**
     * msj
     * 
     * @var string
     */
    private $msj;

    /**
     * overwrite
     * 
     * @var boolean
     */
    private $overwrite = false;

    function __construct(\CdiGenerator\Entity\Entity $entity) {
        $this->entity = $entity;
    }

    public function generate() {
        $this->genClass();
        $this->genNamespace();
        $this->genUse();
        $this->genDockBlockClass();
        $this->genExtendClass();
        $this->genProperties();
        $this->genToString();
        $this->genFile();
        $this->insertFile();
    }

    /**
     * [1] Genera la Clase
     */
    protected function genClass() {
        $this->setClassGenerator(new \Zend\Code\Generator\ClassGenerator());
        $this->classGenerator->setName($this->getEntity()->getName());
    }

    /**
     * [2] Se genera el namespace de la Clase
     */
    protected function genNamespace() {
        $namespace = $this->getEntity()->getModule()->getName() . "\Entity";
        $this->class->setNamespaceName($namespace);
    }

    /**
     * [3] Se generan los Use necesarios
     */
    protected function genUse() {
        $this->class->addUse("Doctrine\Common\Collections\ArrayCollection");
        $this->class->addUse("Zend\Form\Annotation");
        $this->class->addUse("Doctrine\ORM\Mapping", "ORM");
        $this->class->addUse("Doctrine\ORM\Mapping\UniqueConstraint", "UniqueConstraint");
    }

    /**
     * [4] Se generan el DockBlock de la Clase (Table % Repository)
     */
    protected function genDockBlockClass() {
        $dockBlock = new \Zend\Code\Generator\DocBlockGenerator();
        $a = [
            ["name" => 'ORM\Table(name="' . $this->genTableName() . '"' . $this->genCustomTable() . ')'],
            ["name" => 'ORM\Entity(repositoryClass="' . $this->genRepositoryClass() . '")'],
        ];
        $dockBlock->setTags($a);
        $this->class->setDocBlock($dockBlock);
    }

    /**
     * [5] Se genera extend class
     */
    protected function genExtendClass() {
        if ($this->getEntity()->getExtends()) {
            $this->class->setExtendedClass($this->getEntity()->getExtends());
        }
    }

    /**
     * [6] Se generan Properties
     */
    protected function genProperties() {
        foreach ($this->getEntity()->getProperties() as $property) {
            //GENERATE AND ADD Property +(Getter&Setter) to Class 
            \CdiGenerator\Generator\PropertyGenerator::generate($property, $this->class);
        }
    }

    /**
     * [7] Se genera ToString
     */
    protected function genToString() {

        //BODY
        $toString = "return ";
        foreach ($this->getEntity()->getProperties() as $property) {
            $toString .= ' $this->' . $property->getName() . '." ". ';
        }
        trim($toString, ".");
        $toString .= ';';

        //GENERATE
        $m = new \Zend\Code\Generator\MethodGenerator ( );
        $m->setName(
                "__toString");
        $m->setBody($toString);
        return $m;
    }

    /**
     * [8] Se genera FILE
     */
    protected function genFile() {
        $this->file = new \Zend\Code\Generator\FileGenerator();
        $this->getFile()->setClass($this->getClassGenerator());
    }

    /**
     * [9] Se Inserta File
     */
    protected function insertFile() {
        try {
            $path = $this->getEntity()->getModule()->getPath() . "/src/Entity/";
            $name = $this->getEntity()->getName() . ".php";
            $fileName = $path . $name;

            if ($this->getOverwrite() == true || !file_exists($fileName)) {
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                file_put_contents($fileName, $this->getFile()->generate());
                $this->msj = "File generated";
                $this->status = true;
            } else {
                $this->msj = "File exists";
                $this->status = false;
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    /**
     * Generate RepositoryClass Name
     */
    protected function genRepositoryClass() {
        return $this->getEntity()->getModule()->getName() . '\\Repository\\' . $entity->getName() . 'Repository';
    }

    /**
     * Generate Table Name
     */
    protected function genTableName() {
        return $this->getEntity()->getModule()->getPrefix() . '_' . $this->getEntity()->getTblName();
    }

    /**
     * Generate Custom Table
     */
    protected function genCustomTable() {
        if ($this->getEntity()->getCustomOnTable()) {
            return ", " . $this->getEntity()->getCustomOnTable();
        }
        return null;
    }

    function getEntity() {
        if (!$this->entity) {
            throw new Exception("Entity no set");
        }
        return $this->entity;
    }

    function setEntity(\CdiGenerator\Entity\Entity $entity) {
        $this->entity = $entity;
    }

    function getFile() {
        return $this->file;
    }

    function setFile(\Zend\Code\Generator\FileGenerator $file) {
        $this->file = $file;
    }

    function getClassGenerator() {
        return $this->classGenerator;
    }

    function setClassGenerator(\Zend\Code\Generator\ClassGenerator $classGenerator) {
        $this->classGenerator = $classGenerator;
    }

    function getStatus() {
        return $this->status;
    }

    function getMsj() {
        return $this->msj;
    }

    function getOverwrite() {
        return $this->overwrite;
    }

    function setOverwrite($overwrite) {
        $this->overwrite = $overwrite;
    }

}
