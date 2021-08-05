@extends('layouts.plantilla')

    @section('contenido')

        <h1>Alta de un destino</h1>

        <div class="bg-light border-secondary col-8 mx-auto shadow rounded p-4">

            <form action="/agregarDestino" method="post">
            @csrf
                Destino: <br>
                <input type="text" name="destNombre" class="form-control">
                Región: <br>
                <input type="text" name="regID" class="form-control">
                Precio: <br>
                <input type="text" name="destPrecio" class="form-control">
                Asientos: <br>
                <input type="text" name="destAsientos" class="form-control">
                Asientos Disponibles: <br>
                <input type="text" name="destDisponibles" class="form-control"><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="destActivo" id="destActivo1" value="1" checked>
                    <label class="form-check-label" for="destActivo1">
                      Activo
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="destActivo" id="destActivo2" value="0">
                    <label class="form-check-label" for="destActivo2">
                      No Activo
                    </label>
                  </div>
                <br>
                <button class="btn btn-dark">Agregar</button>
                <a href="/adminDestinos" class="btn btn-outline-secondary ml-3">
                    Volver a panel
                </a>
            </form>

        </div>

    @endsection
