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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.7/jquery.inputmask.min.js"
            integrity="sha512-x3zoB6e8YsZipoDoCTClRYkEpqucilZ8IYsaJFE0XUtUJQdO7v2xFzvd1zQKrb3ParCNpvdAE0C85msCw3NrLA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#cc-number').inputmask({ mask: "9999 9999 9999 9999", keepStatic: true, "placeholder": "0000 0000 0000 0000" });
        $('#cc-expiration').inputmask({ mask: "99 / 99", keepStatic: true, "placeholder": "MM / YY" });
        $('#cc-cvv').inputmask({ mask: "999", keepStatic: true, "placeholder": "000" });
    </script>
@stop
