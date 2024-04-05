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
                    <td>{{ $order->products->sum('qty') }}</td>
                    <td>
                        @foreach ($order->products as $product)
                            {{ $product->name }} ({{ $product->pivot->qty }}),
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
