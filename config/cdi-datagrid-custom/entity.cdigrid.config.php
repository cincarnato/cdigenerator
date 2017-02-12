<?php

return [
    //Entity
    "CdiGenerator_Entity" => [
        "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiGenerator\Entity\Entity",
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
            "properties" => [
                "hidden" => true
            ],
            "path" => [
                "hidden" => true
            ],
            "Properties" => [
                "tdClass" => "text-center"
            ]
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

