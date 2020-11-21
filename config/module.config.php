<?php

declare(strict_types=1);

use Doctrine\ORM\Mapping\Driver\XmlDriver;

return [
    'doctrine' => [
        'driver' => [
            'lmcuser_entity' => [
                'class' => XmlDriver::class,
                'paths' => __DIR__ . '/xml/lmcuser'
            ],

            'orm_default' => [
                'drivers' => [
                    'LmcUser\Entity'  => 'lmcuser_entity'
                ]
            ]
        ]
    ],
];
