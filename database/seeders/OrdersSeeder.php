<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Crear 20 ordenes
        for ($i = 0; $i < 20; $i++) {
            $order = Order::create([
                'order_ref' => 'OrderRef-' . ($i + 1),
                'customer_name' => 'Customer ' . ($i + 1)
            ]);

            // Crear líneas de orden asociadas
            for ($j = 0; $j < rand(1, 5); $j++) {
                $product = Product::inRandomOrder()->first();

                OrderLine::create([
                    'order_id' => $order->id,
                    'qty' => rand(1, 10),
                    'product_id' => $product->id
                ]);
            }
        }
    }
}
