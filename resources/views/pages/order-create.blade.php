@extends("layout.layout")
@section('main')
    <div class="row mt-4">
        <div class="col">
            @component("components.product-item", [ 'product' => $product, 'showBtnComprar' => false])
            @endcomponent
        </div>
        <div class="col">
            @component("components.order-create-form")
            @endcomponent
        </div>
    </div>
@stop
