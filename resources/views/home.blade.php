@extends("layout.layout")
@section('main')
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row mb-md-2">
                @foreach($products as $products)
                    <div class="col-md-6 col-lg-4">
                        @component("components.product-item", [ 'product' => $products])

                        @endcomponent
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
