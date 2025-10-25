<?php

namespace RonaldMirabal\ConsultasDgiiRnc\Commands;

use Illuminate\Console\Command;

class ConsultasDgiiRncCommand extends Command
{
    public $signature = 'consultas-dgii-rnc';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
