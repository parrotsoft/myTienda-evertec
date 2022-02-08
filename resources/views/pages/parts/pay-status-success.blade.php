<div class="alert alert-success text-center" role="alert">
    <h4 class="alert-heading">¡Tu pago exitoso!</h4>
    <p>Gracias por su compra!</p>
</div>

<div class="row">
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
        </div>
    </div>
</div>
