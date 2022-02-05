<form method="post" action="{{ route('orders.store') }}">
    @csrf
    <input type="number" name="product_id" id="product_id" value="{{  $product_id }}" hidden>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type="text" class="form-control"name="customer_name" id="customer_name" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control"name="customer_email" id="customer_email" required>
    </div>
    <div class="mb-3">
        <label for="customer_mobile" class="form-label">Celular</label>
        <input type="tel" class="form-control" name="customer_mobile" id=customer_mobile" required>
    </div>
    <button type="submit" class="btn btn-primary">Comprar</button>
</form>
