@extends("layout.layout")
@section('main')

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
                <div class="mb-2">
                    <p class="mb-0 fw-bold text-secondary">Producto</p>
                    <p class="mb-0">$85,977.00</p>
                </div>
                <div class="mb-2 border-bottom pb-2" style="border-bottom-width: 2px !important; border-bottom-style: dashed !important">
                    <p class="mb-0 fw-bold text-secondary">Envío</p>
                    <p class="mb-0 text-success">Gratis</p>
                </div>
                <div>
                    <p class="mb-0 fw-bold text-secondary">Total</p>
                    <p class="mb-0">$30,000</p>
                </div>
            </div>
            <button class="btn btn-sm btn-primary fs-5">Pagar</button>
        </div>
    </div>
@stop
