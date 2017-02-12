<?php

return [
    //Entity
    "CdiGenerator_Property" => [
        "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiGenerator\Entity\Property",
                "entityManager" => "doctrine.entitymanager.orm_cdigenerator"
            ]
        ],
        "columnsConfig" => [
            "createdAt" => [
                "type" => "date",
                "displayName" => "Creado",
                "format" => "Y-m-d H:i:s"
            ],
            "updatedAt" => [
                "type" => "date",
                "displayName" => "Actualizado",
                "format" => "Y-m-d H:i:s"
            ],
            "absolutepath" => [
                "hidden" => true
            ],
            "webpath" => [
                "hidden" => true
            ],
            "description" => [
                "hidden" => true
            ],
            "label" => [
                "hidden" => true
            ],
            "exclude" => [
                "hidden" => true
            ],
            "entity" => [
                "hidden" => true
            ], 
            "beNullable" => [
                "displayName" => "Null",
            ],
            "beUnique" => [
                "displayName" => "Unique",
            ],
            "hidden" => [
                "hidden" => true
            ],
            "mandatory" => [
                "hidden" => true
            ],
        ],
        "crudConfig" => [
            "enable" => true,
            "add" => [
                "enable" => true,
            ],
            "edit" => [
                "enable" => true,
            ],
            "del" => [
                "enable" => true,
            ],
            "view" => [
                "enable" => true,
            ],
        ],
    ],
];

