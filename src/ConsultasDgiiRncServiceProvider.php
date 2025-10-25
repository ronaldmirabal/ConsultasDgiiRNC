<?php

namespace RonaldMirabal\ConsultasDgiiRnc;

use Illuminate\Support\ServiceProvider;


class ConsultasDgiiRncServiceProvider extends ServiceProvider
{


      public function register(): void
    {
        $this->app->singleton(ConsultasDgiiRnc::class, function () {
            return new ConsultasDgiiRnc();
        });
    }
}
