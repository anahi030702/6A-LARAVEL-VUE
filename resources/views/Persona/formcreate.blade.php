@extends('Layouts.layout-crud')

@section('titulo', 'Nuevo usuario')

@section('main')

    <div class="row">
        <div class="col text-center">
            <h2>Nuevo usuario</h2>
        </div>
    </div>
    <div class="row" style="margin-top: 2%;">
        <div class="col-2"></div>
        <div class="col-8">
            <form method="POST" action="/personas/create">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="name@example.com" min="3" name="nombre" value="{{ old('nombre') }}">
                    <label for="nombre">Nombre</label>
                    @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('ap_paterno') is-invalid @enderror" id="ap_paterno" placeholder="name@example.com" name="ap_paterno" value="{{ old('ap_paterno') }}">
                    <label for="ap_paterno">Apellido paterno</label>
                    @error('ap_paterno')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('ap_materno') is-invalid @enderror" id="ap_materno" placeholder="name@example.com" name="ap_materno" value="{{ old('ap_materno') }}">
                    <label for="ap_materno">Apellido materno</label>
                    @error('ap_materno')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
    
@endsection
   