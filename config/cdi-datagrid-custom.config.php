<?php

return  [
     //MODULE
    "CdiGenerator_Module" => [
        "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiGenerator\Entity\Module",
                "entityManager" => "doctrine.entitymanager.orm_cdigenerator"
            ]
        ],
        "columnsConfig" => array(
            "createdAt" => [
                "type" => "date",
                "displayName" => "Creado en Fecha",
                "format" => "Y-m-d H:i:s"
            ],
            "updatedAt" => [
                "type" => "date",
                "displayName" => "Ultima Actualizacion",
                "format" => "Y-m-d H:i:s"
            ],
            "entities" => [
                "hidden" => true
            ],
            "path" => [
                "hidden" => true
            ],
             "admin" => [
                "tdClass" => "text-center"
            ]
        )
    ],
    
];

