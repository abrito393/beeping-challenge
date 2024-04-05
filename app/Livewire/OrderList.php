<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderList extends Component
{
    public $orders;

    public function mount()
    {
        dd(Order::with('orderLines.product')->get());
        $this->orders = Order::with('orderLines')->get();
    }

    public function render()
    {
        return view('livewire.order-list');
    }
}
