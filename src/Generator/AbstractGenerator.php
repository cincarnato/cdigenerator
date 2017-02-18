<?php

namespace CdiGenerator\Generator;

/**
 * Description of AbstractGenerator
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
abstract  class AbstractGenerator {
   

    /**
     * Description
     * 
     * @var \Zend\Code\Generator\ClassGenerator
     */
    protected $classGenerator;

    /**
     * Description
     * 
     * @var \Zend\Code\Generator\FileGenerator
     */
    protected $file;

    /**
     * fileGenerate by \Zend\Code\Generator\FileGenerator
     * 
     */
    protected $fileGenerate;

    /**
     * path
     * 
     * @var string
     */
    protected $path;

    /**
     * path
     * 
     * @var string
     */
    protected $completePath;

    /**
     * name
     * 
     * @var string
     */
    protected $name;

    /**
     * fileName
     * 
     * @var string
     */
    protected $fileName;

    /**
     * Status
     * 
     * @var string
     */
    protected $status;

    /**
     * msj
     * 
     * @var string
     */
    protected $msj;

    /**
     * overwrite
     * 
     * @var boolean
     */
    protected $overwrite = false;

    /**
     * exist
     * 
     * @var boolean
     */
    protected $exists = null;
    
    function getClassGenerator() {
        return $this->classGenerator;
    }

    function getFile() {
        return $this->file;
    }

    function getFileGenerate() {
        return $this->fileGenerate;
    }

    function getPath() {
        return $this->path;
    }

    function getCompletePath() {
        return $this->completePath;
    }

    function getName() {
        return $this->name;
    }

    function getFileName() {
        return $this->fileName;
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

    function getExists() {
        return $this->exists;
    }
    
    function setClassGenerator(\Zend\Code\Generator\ClassGenerator $classGenerator) {
        $this->classGenerator = $classGenerator;
    }

    function setFile(\Zend\Code\Generator\FileGenerator $file) {
        $this->file = $file;
    }

    function setOverwrite($overwrite) {
        $this->overwrite = $overwrite;
    }




}
