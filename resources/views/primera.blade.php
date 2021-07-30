<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Primera view</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header class="p-4 bg-dark text-white">
        Encabezado
    </header>
    <main class="container">
        <h1>Nuesta primera vista</h1>
        {{ date('d/m/Y') }}
        <br>
        
        <h2>Condicional</h2>
        @if($nombre == 'azael')
            bienvenido {{$nombre}}
        @else
            usuario desconocido
        @endif

        <h2>Iteración</h2>
        <ul class="col-4 bg-light shadow">
            @foreach ($cenas as $cena)
                <li>{{$cena}}</li>
            @endforeach
        </ul>
    </main>
</body>
</html>