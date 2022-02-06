<div class="alert {{ $status === 2 ? 'alert-danger' : 'alert-warning' }} text-center" role="alert">
    <h4 class="alert-heading"> {{ $status === 2 ? 'Compra cancelada': 'Pago pendiente' }}</h4>
    <p>{{ $message }}</p>

    <div class="row">
        <div class="col">
            @if($status === 3)
                <a class="btn btn-primary" href="{{ $processUrl }}">Consultar</a>
            @endif
            @if($status === 2)
                <a class="btn btn-primary" href="{{ route("orders.checkout.create", $order->id ) }}">Reintentar</a>
            @endif
        </div>
    </div>
</div>
