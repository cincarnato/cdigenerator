<?php

namespace CdiGenerator\Generator;

/**
 * Description of ModuleGenerator
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class RepositoryGenerator extends AbstractGenerator {

    /**
     * Description
     * 
     * @var \CdiGenerator\Entity\Entity
     */
    private $entity;

    function __construct(\CdiGenerator\Entity\Entity $entity) {
        $this->entity = $entity;
    }

    function getEntity() {
        return $this->entity;
    }

    function setEntity(\CdiGenerator\Entity\Entity $entity) {
        $this->entity = $entity;
    }

    public function generate() {
        $this->genClass();
        $this->genNamespace();
        $this->genUse();
        $this->genDockBlockClass();
        $this->genExtendClass();
        $this->genSaveAndRemove();
        $this->genFile();
        $this->insertFile();
    }

    /**
     * [1] Genera la Clase
     */
    protected function genClass() {
        $this->setClassGenerator(new \Zend\Code\Generator\ClassGenerator());
        $this->classGenerator->setName($this->getEntity()->getName() . "Repository");
    }

    /**
     * [2] Se genera el namespace de la Clase
     */
    protected function genNamespace() {
        $namespace = $this->getEntity()->getModule()->getName() . "\Repository";
        $this->classGenerator->setNamespaceName($namespace);
    }

    /**
     * [3] Se generan los Use necesarios
     */
    protected function genUse() {
        $this->classGenerator->addUse("Doctrine\ORM\EntityRepository");
    }

    /**
     * [4] Se generan el DockBlock de la Clase (Table % Repository)
     */
    protected function genDockBlockClass() {
        $dockBlock = new \Zend\Code\Generator\DocBlockGenerator();
        $a = [
            ["name" => 'Repository']
        ];
        $dockBlock->setTags($a);
        $this->classGenerator->setDocBlock($dockBlock);
    }

    /**
     * [5] Se genera extend class
     */
    protected function genExtendClass() {

        $this->classGenerator->setExtendedClass("\Doctrine\ORM\EntityRepository");
    }

    /**
     * [6] Se genera save and delete
     */
    protected function genSaveAndRemove() {

        //PARAM (BOTH)
        $param = new \Zend\Code\Generator\ParameterGenerator("entity", $this->getEntity()->getFullName());

        //SAVE METHOD
        $save = new \Zend\Code\Generator\MethodGenerator ( );
        $save->setName("save");
        $save->setBody(
                ' $this->getEntityManager()->persist($entity);'
                . ' $this->getEntityManager()->flush();');
        $save->setParameter($param);
        $this->getClassGenerator()->addMethodFromGenerator($save);


        //REMOVE Method
        $remove = new \Zend\Code\Generator\MethodGenerator ( );
        $remove->setName("remove");
        $remove->setBody(
                ' $this->getEntityManager()->remove($entity);'
                . ' $this->getEntityManager()->flush();');
        $remove->setParameter($param);
        $this->getClassGenerator()->addMethodFromGenerator($remove);
    }

    /**
     * [7] Se genera FILE
     */
    protected function genFile() {
        $this->file = new \Zend\Code\Generator\FileGenerator();
        $this->getFile()->setClass($this->getClassGenerator());
    }

    /**
     * [8] Se Inserta File
     */
    protected function insertFile() {
        try {
            $dir = realpath(__DIR__ . "/../../../../../");

            $this->path = $this->getEntity()->getModule()->getPath() . "/src/Repository/";
            $this->completePath = $dir . $this->path;
            $this->name = $this->getEntity()->getName() . "Repository.php";
            $this->fileName = $this->completePath . $this->name;


            $this->exists = file_exists($this->fileName);

            if ($this->getOverwrite() == true || !$this->exists) {
                if (!is_dir($this->completePath)) {
                    mkdir($this->completePath, 0777, true);
                }

                $this->fileGenerate = $this->getFile()->generate();

                file_put_contents($this->fileName, $this->fileGenerate);

                if ($this->exists) {
                    $this->msj = "File overwritten";
                } else {
                    $this->msj = "Generated file";
                }


                $this->status = true;
            } else {
                $this->msj = "File exists";
                $this->status = false;
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }

}
