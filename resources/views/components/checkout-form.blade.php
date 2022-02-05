<h4 class="mb-3">Pago</h4>

<form action="">
    <div class="my-3">
        <div class="form-check">
            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
            <label class="form-check-label" for="credit">Tarjeta de crédito</label>
        </div>
        <div class="form-check">
            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" disabled>
            <label class="form-check-label" for="debit">Tarjeta de débito</label>
        </div>
        <div class="form-check">
            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" disabled>
            <label class="form-check-label" for="paypal">PayPal</label>
        </div>
    </div>

    <div class="row gy-3">
        <div class="col-md-6">
            <label for="cc-name" class="form-label">Nombre en la tarjeta</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Nombre completo como se muestra en la tarjeta</small>
        </div>

        <div class="col-md-6">
            <label for="cc-number" class="form-label">Número de tarjeta de crédito</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
         </div>

        <div class="col-md-3">
            <label for="cc-expiration" class="form-label">Vencimiento</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
        </div>

        <div class="col-md-3">
            <label for="cc-cvv" class="form-label">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
        </div>
    </div>

    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Pagar</button>
</form>
