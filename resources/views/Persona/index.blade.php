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

<form method="GET" action="/personas/create/form">
    @csrf
 
    <button>Agregar persona</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
<br>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
        </thead>
        <tbody>
            @foreach ( $personas as $persona )
            <tr>
                <td>{{$persona->nombre}}</td>
                <td>{{$persona->ap_paterno}}</td>
                <td>{{$persona->ap_materno}}</td>

                <form method="GET" action="/personas/viewdata">
                @csrf
                <td><button>Ver persona</button></td>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{$persona->id}}" />
                <input type="hidden" name="nombre" value="{{$persona->nombre}}" />
                <input type="hidden" name="ap_paterno" value="{{$persona->ap_paterno}}" />
                <input type="hidden" name="ap_materno" value="{{$persona->ap_materno}}" />

                </form>

            </tr>
        @endforeach
        </tbody>
    </table>
    
</body>
</html>