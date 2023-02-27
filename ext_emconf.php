<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'femanager direct mail subscription',
    'description' => 'Adds direct mail fields to femanager',
    'category' => 'plugin',
    'author' => 'Torben Hansen',
    'author_email' => 'derhansen@gmail.com',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '2.1.3',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'femanager' => '7.0.0-7.99.99',
            'direct_mail' => ''
        ],
        'conflicts' => [],
        'suggests' => [],
    ]
];