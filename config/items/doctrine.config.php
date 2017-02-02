<?php
namespace CdiGenerator;

/**
* @author Cristian Incarnato <cristian.cdi@gmail.com>
*/

return [
    'doctrine' => array(
        'connection' => array(
            'orm_cdigenerator' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOSqlite\Driver',
                'params' => array(
                    'path' => __DIR__ . '/../../../../data/cdigenerator/cdigenerator.db',
                )
            )
        ),
        'entitymanager' => array(
            'orm_cdigenerator' => array(
                'connection' => 'orm_cdigenerator',
                'configuration' => 'conf_cdigenerator'
            ),
        ),
        'eventmanager' => array(
            'orm_cdigenerator' => array(
                'subscribers' => array(
                    'Gedmo\Timestampable\TimestampableListener',
                ),
            ),
        ),
          'configuration' => array(
            'conf_cdigenerator' => array(
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'driver' => 'drv_cdigenerator', // This driver will be defined later
                'generate_proxies' => true,
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
                'filters' => array()
            )
        ),
        'driver' => array(
            'cdigenerator_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => array(__DIR__ . '/../src/Entity')
            ),
            'drv_cdigenerator' => array(
                'class' => "Doctrine\ORM\Mapping\Driver\DriverChain",
                'drivers' => array(
                    'CdiEntity\Entity' => 'cdigenerator_entity',
                ),
            ),
        ),
    ),
];
