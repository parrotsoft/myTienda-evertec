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
