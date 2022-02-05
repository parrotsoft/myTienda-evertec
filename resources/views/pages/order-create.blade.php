@extends("layout.layout")
@section('main')
    <div class="row mt-4">
        <div class="col">
            @component("components.product-item", [ 'product' => $product, 'showBtnComprar' => false])
            @endcomponent
        </div>
        <div class="col my-auto">
            <h3>Datos del comprador</h3>
            @component("components.order-create-form", [ 'product_id' => $product['id'] ])
            @endcomponent
        </div>
    </div>
@stop

