<header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <img src="{{ url('/images/logo.png') }}" width="30">
            <span class="fs-4">MyTienda-Evertec</span>
        </a>
        @include("layout.parts.navbar")
    </div>
    @include("layout.parts.carousel")
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-5 fw-normal">NUESTROS PRODUCTOS</h1>
        <p class="fs-5 text-muted">Esta semana los siguientes productos fueron los más vendidos.</p>
    </div>
</header>
