<section>
    <div class="card shadow-sm border-light mb-4">
        <a href="#" class="position-relative">
            <img src="{{ $product['photo'] }}" class="card-img-top" alt="image">
        </a>
        <div class="card-body">
            <a href="#">
                <h5 class="font-weight-normal">{{ $product['name'] }}</h5>
            </a>
            <div class="post-meta"><span class="small lh-120">
                    <i class="fas fa-map-marker-alt mr-2"></i>{{ $product['description'] }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <div class="col pl-0">
                    <span class="text-muted font-small d-block mb-2">Precio :</span>
                    <span class="h5 text-dark font-weight-bold">$ {{ number_format($product['price'], 2) }}</span>
                </div>
                @if($showBtnComprar)
                <div class="col pr-0">
                    <a class="btn btn-info btn-sm d-block mt-4 w-100" href="{{ route('orders.create', [$product['id']]) }}">Comprar</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
