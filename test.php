<?php

require __DIR__ . '/vendor/autoload.php';

$client = \Elasticsearch\ClientBuilder::create()->build();

$params = [
    'index' => 'test',
    'type' => 'abc',
    'id' => '1',
    'body' => ['name' => 'test1', 'type' => 'doc', 'notes' => 'this is test']
];

$response = $client->index($params);
print_r($response);

$params = [
    'index' => 'test',
    'type' => 'abc',
    'id' => '1'
];

$response = $client->get($params);
print_r($response);


$params = [
    'index' => 'test',
    'type' => 'abc',
    'body' => [
        'query' => [
            'match' => [
                'testField' => 'test'
            ]
        ]
    ]
];

$response = $client->search($params);
print_r($response);