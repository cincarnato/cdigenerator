<?php

namespace CdiGenerator;

/**
 * Description of AnnotationGenerator
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class DoctrineAnnotation {

    /**
     * ID
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function ID() {
        return [
            [
                "name" => 'ORM\Id'
            ]
        ];
    }

    /**
     * AUTOGENERATEDVALUE
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function AUTOGENERATEDVALUE() {
        return [
            [
                "name" => 'ORM\GeneratedValue(strategy="AUTO")'
            ]
        ];
    }

    /**
     * STRING
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function STRING($property) {
        return [
            [
                "name" => 'ORM\Column(type="string", length=' . $property->getLength() . ', unique=' . self::booleanString($property->getBeUnique()) . ', nullable=' . self::booleanString($property->getBeNullable()) . ', name="' . self::camelToUnder($property->getName()) . '")'
            ]
        ];
    }

    /**
     * STRING
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function TEXT($property) {
        return [
            [
                "name" => 'ORM\Column(type="text", unique=' . self::booleanString($property->getBeUnique()) . ', nullable=' . self::booleanString($property->getBeNullable()) . ', name="' . self::camelToUnder($property->getName()) . '")'
            ]
        ];
    }

    /**
     * INTEGER
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function INTEGER($property) {
        return [
            [
                "name" => 'ORM\Column(type="integer", length=' . $property->getLength() . ', unique=' . self::booleanString($property->getBeUnique()) . ', nullable=' . self::booleanString($property->getBeNullable()) . ', name="' . self::camelToUnder($property->getName()) . '")'
            ]
        ];
    }

    /**
     * BOOLEAN
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function BOOLEAN($property) {
        return [
            [
                "name" => 'ORM\Column(type="boolean", nullable=' . self::booleanString($property->getBeNullable()) . ', name="' . strtolower($property->getName()) . '")'
            ]
        ];
    }

    /**
     * INTEGER
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function DECIMAL($property) {
        return [
            [
                "name" => 'ORM\Column(type="decimal", scale=2, precision=' . $property->getLength() . ', unique=' . self::booleanString($property->getBeUnique()) . ', nullable=' . self::booleanString($property->getBeNullable()) . ', name="' . self::camelToUnder($property->getName()) . '")'
            ]
        ];
    }

    /**
     * DATE
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function DATE($property) {
        return [
            [
                "name" => 'ORM\Column(type="date", unique=' . self::booleanString($property->getBeUnique()) . ', nullable=' . self::booleanString($property->getBeNullable()) . ', name="' . self::camelToUnder($property->getName()) . '")'
            ]
        ];
    }

    /**
     * DATETIME
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function DATETIME($property) {
        return [
            [
                "name" => 'ORM\Column(type="datetime", unique=' . self::booleanString($property->getBeUnique()) . ', nullable=' . self::booleanString($property->getBeNullable()) . ', name="' . self::camelToUnder($property->getName()) . '")'
            ]
        ];
    }

    /**
     * TIME
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function TIME($property) {
        return [
            [
                "name" => 'ORM\Column(type="time", unique=' . self::booleanString($property->getBeUnique()) . ', nullable=' . self::booleanString($property->getBeNullable()) . ', name="' . self::camelToUnder($property->getName()) . '")'
            ]
        ];
    }

    /**
     * ONETOONE
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function ONETOONE($property) {
        return [

            ["name" => 'ORM\OneToOne(targetEntity="' . $property->getRelatedEntity()->getFullName() . '")'],
            ["name" => 'ORM\JoinColumn(name="' . self::camelToUnder($property->getName()) . '_id", referencedColumnName="id"' . ($property->getBeNullable() ? ', nullable=true' : ', nullable=false') . ')']
        ];
    }

    /**
     * MANYTOONE
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function MANYTOONE($property) {
        return [

            ["name" => 'ORM\ManyToOne(targetEntity="' . $property->getRelatedEntity()->getFullName() . '")'],
            ["name" => 'ORM\JoinColumn(name="' . self::camelToUnder($property->getName()) . '_id", referencedColumnName="id"' . ($property->getBeNullable() ? ', nullable=true' : ', nullable=false') . ')']
        ];
    }

    /**
     * ONETOMANY
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function ONETOMANY($property) {
        return [
            ["name" => 'ORM\OneToMany(targetEntity="' . $property->getRelatedEntity()->getFullName() . '", mappedBy="' . lcfirst($property->getEntity()->getName()) . '")'],
        ];
    }

    /**
     * ONETOMANY
     * 
     * @param \CdiGenerator\Entity\Property $property
     * @return Array
     */
    static function MANYTOMANY($property) {
        return [

            ["name" => 'ORM\ManyToMany(targetEntity="' . $property->getRelatedEntity()->getFullName() . '")'],
        ];
    }

    /**
     * booleanString
     *
     * @param boolean $value
     * @return string
     */
    static function booleanString($value) {
        if ($value) {
            return "true";
        } else {
            return "false";
        }
    }

    /**
     * camelToUnder
     *
     * @param string $input
     * @return string
     */
    static function camelToUnder($input) {
        $output = ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $input)), '_');
        return $output;
    }

}
