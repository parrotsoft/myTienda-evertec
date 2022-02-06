<form method="post" action="{{ route('orders.store') }}">
    @csrf
    <input type="number" name="product_id" id="product_id" value="{{  $product_id }}" hidden>
    <div class="mb-1">
        <label for="customer_name" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="customer_name" id="customer_name"
               value="{{ old('customer_name') }}" required>
    </div>
    <div class="mb-1">
        <label for="customer_email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="customer_email" id="customer_email"
               value="{{ old('customer_email') }}" required>
    </div>
    <div class="mb-1">
        <label for="customer_mobile" class="form-label">Celular</label>
        <input type="tel" class="form-control" name="customer_mobile" id=customer_mobile"
               value="{{ old('customer_mobile') }}" required>
    </div>
    <div class="mb-1">
        <label for="customer_address" class="form-label">Dirección</label>
        <input type="address" class="form-control" name="customer_address" id=customer_address"
               value="{{ old('customer_address') }}" required>
    </div>


    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p><strong>Huy! Algo salió mal</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-end mt-2">
        <a type="submit" class="btn ml-auto btn-danger me-2 w-25 mt-2" href="{{ route("home") }}">Cancelar</a>
        <button type="submit" class="btn ml-auto btn-primary w-25 mt-2">Comprar</button>
    </div>
</form>
