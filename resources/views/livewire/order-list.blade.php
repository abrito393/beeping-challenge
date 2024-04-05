<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Referencia</th>
                <th>Cliente</th>
                <th>Cantidad total</th>
                <th>Productos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_ref }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->orderLines->sum('qty') }}</td>
                    <td>
                        <ul>
                            @foreach ($order->orderLines as $singleOrder)
                                <li>{{ $singleOrder->product->name }} ({{ $singleOrder->qty }})</li> 
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="order-stats">
        <span>
            <strong>Pedidos: {{ $lastExecuted->total_orders }} - Total: {{ $lastExecuted->total_cost }} - ({{ $lastExecuted->created_at }})</strong>
        </span>

    </div>

</div>
