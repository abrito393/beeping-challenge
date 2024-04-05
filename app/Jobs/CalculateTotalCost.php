<?php

namespace App\Jobs;

use App\Models\OrderLine;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CalculateTotalCost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $totalOrderLine = OrderLine::count();
        $orderLinesSum = OrderLine::with('product:id,cost') // Specify only id and cost for product
            ->get()
            ->map(function ($orderLine) {
                return $orderLine->qty * $orderLine->product->cost;
            })
            ->sum();
        
        $response = Http::post(config('app.url') . '/api/executed/create', [
            'total_orders' => $totalOrderLine,
            'total_cost' => $orderLinesSum * $totalOrderLine,
        ]);

        if ($response->successful()) {
            Log::info('El costo total se ha calculado y guardado correctamente.');
        } else {
            Log::error('Error al enviar el costo total a la API.');
        }
    }
}
