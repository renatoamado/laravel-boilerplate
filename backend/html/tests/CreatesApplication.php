<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        if (env('DB_DATABASE') !== 'tests_database') {
            throw new \Exception('É proibido rodar testes na base original, favor apontar para o backend para o banco de testes.');
        }
        
        return $app;
    }
}
