@extends("layout.layout")
@section('main')
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row mb-md-2">
                <div class="col-md-6 col-lg-4">
                    @component("components.product-item", [ 'product' => [ 'product_name' => 'PC', 'product_description' => 'Lo mejor', 'producto_price' => 10000 ]])

                    @endcomponent
                </div>
            </div>
        </div>
    </section>
@stop
