<?php

namespace SMartins\Cielo\Facades;

use Illuminate\Support\Facades\Facade;

class Cielo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Cielo';
    }
}
