<section>
    <div class="card shadow-sm border-light mb-4">
        <a href="#" class="position-relative">
            <img src="https://via.placeholder.com/500x350/5fa9f8/ffffff" class="card-img-top" alt="image">
        </a>
        <div class="card-body">
            <a href="#">
                <h5 class="font-weight-normal">{{ $product['product_name'] }}</h5>
            </a>
            <div class="post-meta"><span class="small lh-120">
                    <i class="fas fa-map-marker-alt mr-2"></i>{{ $product['product_description'] }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <div class="col pl-0">
                    <span class="text-muted font-small d-block mb-2">Precio :</span>
                    <span class="h5 text-dark font-weight-bold">$ {{ $product['producto_price'] }}</span>
                </div>
                <div class="col pr-0">
                    <button class="btn btn-info btn-sm d-block mt-4 w-100">Comprar</button>
                </div>
            </div>
        </div>
    </div>
</section>
