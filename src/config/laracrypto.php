<?php
return [
    'blockchain' => [
        'guid'  => env('BLOCKCHAIN_GUID'),
        'api'   => env('BLOCKCHAIN_API'),
        'pass'  => env('BLOCKCHAIN_PASS'),
        'pass2' => env('BLOCKCHAIN_PASS2'),
    ],
    'ethereum'   => [
        'url' => env('ETHEREUM_URL', 'http://localhost'),
        'port'  => env('ETHEREUM_PORT', 8545),
    ],
];
