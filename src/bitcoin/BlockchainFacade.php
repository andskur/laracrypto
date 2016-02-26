<?php

namespace Andskur\Larachain;

use Illuminate\Support\Facades\Facade;

class BlockchainFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'blockchain';
    }
}