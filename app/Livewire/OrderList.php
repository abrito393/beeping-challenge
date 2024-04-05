<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Executed;
use Livewire\Component;

class OrderList extends Component
{
    public $orders, $lastExecuted;

    public function mount()
    {
        $this->orders = Order::with('orderLines.product')->get();
        $this->lastExecuted = Executed::latest()->first();
        //dd($this->orders);
    }

    public function render()
    {
        return view('livewire.order-list');
    }
}
