@extends("layout.layout")

@section("title", 'Estado de su pago')

@section('main')

    @if($status === 1)
        @include("pages.parts.pay-status-success")
    @else
        @include("pages.parts.pay-status-error", ["message" => $message, "status" => $status])
    @endif

@stop


