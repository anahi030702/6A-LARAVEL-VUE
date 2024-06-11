<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="/personas/update">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{$id}}" name="id">
    <p>Nombre</p>
    <input type="text" value="{{$nombre}}" name="nombre">
    <p>Apellido Paterno</p>
    <input type="text" value="{{$ap_paterno}}" name="ap_paterno">
    <p>Apellido Materno</p>
    <input type="text" value="{{$ap_materno}}" name="ap_materno">
    <br>
    <br>
    <button>Guardar</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>

    <form method="GET" action="/personas/viewdata">
    @csrf
    <br>
    <button>Cancelar</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{$id}}" />
    </form>

</body>
</html>