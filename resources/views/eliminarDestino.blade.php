@extends('layouts.plantilla')

    @section('contenido')
        <h1>Baja de un destino</h1>

        <div class="bg-light border-secondary col-6 mx-auto
                    shadow rounded p-4 text-danger">
            Se eliminará el destino:
            <span class="lead">{{ $destino->destNombre }}</span>
            <form action="/eliminarDestino" method="post">
            @method('delete')
            @csrf
                <input type="hidden" name="destNombre"
                       value="{{ $destino->destNombre }}">
                <input type="hidden" name="destID"
                       value="{{ $destino->destID }}">
                <button class="btn btn-danger btn-block my-3">
                    Confirmar baja
                </button>
                <a href="/adminDestinos" class="btn btn-outline-secondary btn-block">
                    Volver a panel
                </a>
            </form>
        </div>
        <script>
            Swal.fire(
                'Advertencia',
                'Su pulsa "Confirmar baja", se eliminará el destino',
                'warning'
            )
        </script>

    @endsection
