<?php

return [
    //MODULE
    "CdiGenerator_Module" => [
        "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiGenerator\Entity\Module",
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
            "entities" => [
                "hidden" => true
            ],
             "controllers" => [
                "hidden" => true
            ],
            "path" => [
                "hidden" => true
            ],
            "admin" => [
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

