@extends('layouts.plantilla')

    @section('contenido')

        <h1>Modificación de un destino</h1>

        <div class="bg-light border-secondary col-8 mx-auto shadow rounded p-4">

            <form action="/modificarDestino" method="post">
            @method('patch')
            @csrf
                Destino: <br>
                <input type="text" name="destNombre" class="form-control" value="{{$destino->destNombre}}">
                Región: <br>
                <select name="regID" class="form-control" required>
                    <option value="">Seleccione una Región</option>
                @foreach( $regiones as $region )
                    <option value="{{ $region->regID }}" {{($region->regID == $destino->regID)? 'selected' : ''}}>{{ $region->regNombre }}</option>
                @endforeach
                </select>
                Precio: <br>
                <input type="text" name="destPrecio" class="form-control" value="{{$destino->destPrecio}}">
                Asientos: <br>
                <input type="text" name="destAsientos" class="form-control" value="{{$destino->destAsientos}}">
                Asientos Disponibles: <br>
                <input type="text" name="destDisponibes" class="form-control" value="{{$destino->destDisponibles}}"><br>
                <div class="form-check">
                    <label class="form-check-label" for="destActivo1">
                        <input class="form-check-input" type="radio" name="destActivo" id="destActivo1" value="1"  {{($destino->destActivo)? 'checked' : ''}}>
                      Activo
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="destActivo" id="destActivo2" value="0"  {{!($destino->destActivo)? 'checked' : ''}}>
                    <label class="form-check-label" for="destActivo2">
                      No Activo
                    </label>
                  </div>
                <br>
                <button class="btn btn-dark">Agregar</button>
                <a href="/adminDestinos" class="btn btn-outline-secondary ml-3">
                    Volver a panel
                </a>
                <input type="hidden" name="destID" value="{{$destino->destID}}">
            </form>

        </div>

    @endsection
