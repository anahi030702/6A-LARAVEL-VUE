@extends('Layouts.layout-crud')

@section('titulo', 'Editar usuario')

@section('main')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
        <form method="POST" action="/personas/update">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{$id}}" name="id">
            <div class="mb-3">
                <label class="form-label">Nombre</label >
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $nombre) }}" name="nombre">
                @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control @error('ap_paterno') is-invalid @enderror" value="{{ old('ap_paterno', $ap_paterno) }}" name="ap_paterno">
                @error('ap_paterno')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido Materno</label>
                <input type="text" class="form-control @error('ap_materno') is-invalid @enderror" value="{{ old('ap_materno', $ap_materno) }}" name="ap_materno">
                @error('ap_materno')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-2">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                <div class="col-2">
                    <a href="/inicio">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
                </div>
            </div>
        </form>

        

        </div>
    </div>
   
@endsection
   

