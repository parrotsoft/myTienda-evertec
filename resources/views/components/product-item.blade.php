<div class="card shadow-sm border-light mb-4 rounded product__card {{ $fullWidth ? 'product__card--full_width' : '' }}">
    <a href="#" class="position-relative">
        <img src="{{ $product['photo'] }}" class="card-img-top" alt="image">
    </a>
    <div class="card-body p-2">
        <h5 class="font-weight-normal fs-6 card-title">{{ $product['name'] }}</h5>
        <p class="card-text small product__card__description">
            {{ $product['description'] }}
        </p>
        <div class="d-flex justify-content-between">
            <div class="col pl-0 mt-1">
                <span class="text-dark font-weight-bold fs-6">${{ number_format($product['price'], 2) }}</span>
            </div>
        </div>
        @if($showBtnComprar)
            <div class="col pr-0">
                <a class="btn btn-primary d-block mt-1 w-100" href="{{ route('orders.create', [$product['id']]) }}">Comprar</a>
            </div>
        @endif
    </div>
</div>

<style>
    .product__card {
        width: 185px;
        min-width: 185px;
    }

    .product__card--full_width {
        width: 100%;
    }

    .product__card__description {
        height: 45px;
    }
</style>
