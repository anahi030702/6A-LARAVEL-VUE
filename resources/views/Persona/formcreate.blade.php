<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h2>FORMULARIO</h2>
    <form method="POST" action="/personas/create">
    @csrf
    <p>Nombre</p>
    <input type="text" name="nombre">
    <p>Apellido Paterno</p>
    <input type="text" name="ap_paterno">
    <p>Apellido Materno</p>
    <input type="text" name="ap_materno">
    <br>
    <br>
    <button>Registrar</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>

    <form method="GET" action="/personas">
    @csrf
    <br>
    <button>Cancelar</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
</body>
</html>