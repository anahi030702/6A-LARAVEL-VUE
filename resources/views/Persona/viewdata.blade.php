<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if (session('status'))
    <div class="alert alert-success">
       <h2 style="color: green;">{{ session('status') }}</h2> 
    </div>
@endif
    <p><b>Nombre:</b> {{$nombre}}</p>
    <p><b>Apellido Paterno:</b> {{$ap_paterno}}</p>
    <p><b>Apellido Materno:</b> {{$ap_materno}}</p>

    <form method="GET" action="/personas/viewupdate">
    @csrf
    <button>Editar Informacion</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{$id}}" />
    </form>

    <form method="POST" action="/personas/delete">
    @csrf
    @method('DELETE')
    <br>
    <button>Eliminar Persona</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{$id}}" />
    </form>

    <form method="GET" action="/personas">
    @csrf
    <br>
    <button>Volver al inicio</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
</body>
</html>