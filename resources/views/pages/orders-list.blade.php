@extends("layout.layout")

@section("title", 'Lista de ordenes')

@section('main')

    <form action="{{ route('orders.list') }}" class="row g-3">
        <div class="col-2">
            <input type="date" name="date" id="" class="form-control" value="{{ $date? $date : '' }}">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary btn-sm">Buscar</button>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Celular</th>
            <th scope="col">Direccion</th>
            <th scope="col">Fecha registro</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_email }}</td>
                <td>{{ $order->customer_mobile }}</td>
                <td>{{ $order->customer_address }}</td>
                <td>{{ $order->updated_at }}</td>
                <td>
                    {{ $order->status }}
                    {!! getUrlStatusVerify($order) !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
