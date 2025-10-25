<?php

namespace RonaldMirabal\ConsultasDgiiRnc\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RonaldMirabal\ConsultasDgiiRnc\ConsultasDgiiRnc
 */
class ConsultasDgiiRnc extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \RonaldMirabal\ConsultasDgiiRnc\ConsultasDgiiRnc::class;
    }
}
