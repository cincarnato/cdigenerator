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
             "Entities" => [
                "tdClass" => "text-center"
            ]
        )
    ],
      //CONTROLLER
    "cdiEntityController" => [
        "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiEntity\Entity\Controller",
                "entityManager" => "doctrine.entitymanager.orm_cdientity"
            ]
        ],
        "columnsConfig" => array(
            "createdAt" => [
                "type" => "date",
                "displayName" => "Creado en Fecha",
                "format" => "Y-m-d H:i:s",
                 "hidden" => true
            ],
            "updatedAt" => [
                "type" => "date",
                "displayName" => "Ultima Actualizacion",
                "format" => "Y-m-d H:i:s",
                 "hidden" => true
            ],
            "childs" => [
                "hidden" => true
            ],
        )
    ],
      //MENU
    "cdiEntityMenu" => [
        "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiEntity\Entity\Menu",
                "entityManager" => "doctrine.entitymanager.orm_cdientity"
            ]
        ],
        "columnsConfig" => array(
            "createdAt" => [
                "type" => "date",
                "displayName" => "Creado en Fecha",
                "format" => "Y-m-d H:i:s",
                 "hidden" => true
            ],
            "updatedAt" => [
                "type" => "date",
                "displayName" => "Ultima Actualizacion",
                "format" => "Y-m-d H:i:s",
                 "hidden" => true
            ],
            "childs" => [
                "hidden" => true
            ],
              "parent" => [
                "type" => "relational"
            ],
        )
    ],
     
    //ENTITY
    "cdiEntityEntity" => [
          "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiEntity\Entity\Entity",
                "entityManager" => "doctrine.entitymanager.orm_cdientity"
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
            "properties" => [
                "hidden" => true
            ],
            "extends" => [
                "hidden" => true
            ],
            "customOnTable" => [
                "hidden" => true
            ],
            "tblName" => [
                "hidden" => true
            ],
            "ABM" => [
                "tdClass" => "text-center"
            ],
             "Properties" => [
                "tdClass" => "text-center"
            ]
        )
    ],
    //PROPERTY
    "cdiEntityProperty" => [
          "sourceConfig" => [
            "type" => "doctrine",
            "doctrineOptions" => [
                "entityName" => "\CdiEntity\Entity\Property",
                "entityManager" => "doctrine.entitymanager.orm_cdientity"
            ]
        ],
        "columnsConfig" => array(
            "createdAt" => [
                "type" => "date",
                "displayName" => "Creado en Fecha",
                "format" => "Y-m-d H:i:s",
                   "hidden" => true
            ],
            "updatedAt" => [
                "type" => "date",
                "displayName" => "Ultima Actualizacion",
                "format" => "Y-m-d H:i:s",
                   "hidden" => true
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
        )
    ]
];

