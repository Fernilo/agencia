@extends('layouts.plantilla')

@section('contenido')
    <h1>Panel de administración de destinos</h1>

    @if( session('mensaje') )
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <table class="table table-borderless table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Destino</th>
                <th>Región</th>
                <th>Precio($)</th>
                <th>Asientos</th>
                <th>Disponibles</th>
                <th>Activo</th>

                <th colspan="2">
                    <a href="/agregarDestino" class="btn btn-secondary">
                        Agregar
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach( $destinos as $destino )
                <tr>
                    <td>{{ $destino->destID }}</td>
                    <td>{{ $destino->destNombre }}</td>
                    <td>{{$destino->regNombre}}</td>
                    <td>{{ $destino->destPrecio }}</td>
                    <td>{{ $destino->destAsientos }}</td>
                    <td>{{ $destino->destDisponibles }}</td>
                    <td>{{ $destino->destActivo? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="/modificarRegion/{{ $destino->destID }}" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="/eliminarRegion/{{ $destino->destID }}" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection