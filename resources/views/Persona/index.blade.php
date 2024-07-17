@extends('Layouts.layout-crud')
<!-- @if (session('status'))
    <div class="alert alert-success">
       <h2>{{ session('status') }}</h2> 
    </div>
@endif -->

@section('titulo', 'Inicio')

@section('main')
    <table class="table">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>
        <tbody>
            @foreach ( $personas as $persona )
            <tr>
                <td>{{$persona->nombre}}</td>
                <td>{{$persona->ap_paterno}}</td>
                <td>{{$persona->ap_materno}}</td>
                <td>
                    <a href="/personas/formedit/{{ $persona->id }}">
                    <button class="btn btn-warning">Editar</button>
                    </a>
                </td>
                <td>
                    <form method="POST" action="/personas/borrar/{{ $persona->id }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                </td>


                <form method="GET" action="/personas/viewdata">
                @csrf
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
@endsection
    
    
