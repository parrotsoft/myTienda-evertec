@extends("layout.layout")

@section("title", 'Detalles de la orden')

@section('main')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Nueva orden</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalles de la orden</li>
        </ol>
    </nav>

    <form action="{{ route("orders.checkout.store") }}" method="post">
        @csrf
        <input type="text" name="order_id" value="{{ $order['id'] }}" hidden>
        <div class="row mt-4 w-100">
            <div class="col-4">
                @component("components.product-item", ['product' => $order['product'], 'showBtnComprar' => false, 'fullWidth' => true])
                @endcomponent
            </div>
            <div class="row col mb-4 ms-2 shadow-sm rounded p-3">
                <div class="col">
                    @component("components.customer-order-details", ['order' => $order])
                    @endcomponent
                </div>
                <div class="col">
                    @component("components.order-details", ['product' => $order['product']])
                    @endcomponent
                </div>
                <button type="submit" class="btn btn-sm btn-primary fs-5">Pagar</button>
            </div>
        </div>
    </form>

@stop

