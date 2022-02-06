@extends("layout.layout")
@section('main')
    <div class="row mt-4 status bg-success bg-gradient">
        <div class="d-flex flex-column justify-content-center align-items-center fs-3">
            <i class="bi bi-check2"></i>
            <p>
                Success
            </p>
        </div>
    </div>
@stop

<style>
    .status {
        height: 150px;
        color: white;
    }
</style>
