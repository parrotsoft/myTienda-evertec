<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
    <a class="me-3 py-2 text-dark text-decoration-none {{ (\Request::route()->getName() == 'home') ? 'active-route' : '' }}"
       href="{{ route("home") }}">Inicio</a>
    <a class="me-3 py-2 text-dark text-decoration-none {{ (\Request::route()->getName() == 'orders.list') ? 'active-route' : '' }}"
       href="{{ route("orders.list") }}">Compras</a>
</nav>

