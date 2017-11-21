<?php

return [
    'blockchain' => [
        'guid'  => env('BLOCKCHAIN_GUID'),
        'api'   => env('BLOCKCHAIN_API'),
        'pass'  => env('BLOCKCHAIN_PASS'),
        'pass2' => env('BLOCKCHAIN_PASS2'),
    ],
    'ethereum'   => [
        'uri'  => env('ETHEREUM_URI', 'http://localhost'),
        'port' => env('ETHEREUM_PORT', 8545),
    ],
];
