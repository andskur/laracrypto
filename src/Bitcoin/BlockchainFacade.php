<?php

namespace Andskur\Laracrypto\Bitcoin;

use Illuminate\Support\Facades\Facade;

class BlockchainFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'blockchain';
    }
}