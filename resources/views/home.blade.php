@extends("layout.layout")

@section("carousel")
    @include("layout.parts.carousel")
@stop

@section("banner")
    @include("layout.parts.banner")
@stop

@section('main')
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-center flex-wrap gap-3">
                @foreach($products as $products)
                    @component("components.product-item", [ 'product' => $products, 'showBtnComprar' => true, 'fullWidth' => false])

                    @endcomponent
                @endforeach
            </div>
        </div>
    </section>
@stop
