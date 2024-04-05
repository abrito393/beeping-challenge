<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CalculateTotalCost;
use App\Models\OrderLine;

class ExecuteTotal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'execute:total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcular el costo total de todos los pedidos de forma asíncrona';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CalculateTotalCost::dispatch();

        $this->info('El cálculo del costo total se ha iniciado en segundo plano.');

        return 0;
    }
}
