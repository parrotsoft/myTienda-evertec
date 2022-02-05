@extends("layout.layout")
@section('main')

    <div class="row mt-4">
        <div class="col-3">
            @component("components.product-item", ['product' => $order['product'], 'showBtnComprar' => false])
            @endcomponent
        </div>
        <div class="col-3">
            @component("components.customer-order-details", ['order' => $order])
            @endcomponent
        </div>
        <div class="col-6">
            @component("components.checkout-form")
            @endcomponent
        </div>
    </div>
@stop
