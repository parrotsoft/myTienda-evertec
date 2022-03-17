@extends("layout.layout")

@section("title", 'Nueva orden')

@section('main')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nueva orden</li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col">
            @component("components.product-item", [ 'product' => $product, 'showBtnComprar' => false, 'fullWidth' => true])
            @endcomponent
        </div>
        <div class="col">
            <h3>Datos del comprador</h3>
            @component("components.order-create-form", [ 'product_id' => $product['id'] ])
            @endcomponent
        </div>
    </div>

@stop

