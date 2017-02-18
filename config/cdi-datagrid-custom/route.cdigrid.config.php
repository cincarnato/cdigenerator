<?php

return [
    //Entity
    "CdiGenerator_Route" => [
        "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiGenerator\Entity\Route",
                "entityManager" => "doctrine.entitymanager.orm_cdigenerator"
            ]
        ],
        "columnsConfig" => [
     "childs" => [
                "hidden" => true
            ],
             "parent" => [
                "type" => "relational"
            ],
             "module" => [
                "type" => "relational"
            ],
            "controller" => [
                "type" => "relational"
            ],
            "action" => [
                "type" => "relational"
            ],
            "type" => [
                "type" => "relational"
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

