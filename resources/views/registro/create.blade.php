<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="antialiased">
<link rel="stylesheet" href="../css/pasteles.css">
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6 offset-md-3 mt-5">
        <div class="card">
            <div class="card-header">
                <form action="{{ route('registro.buscarDni') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="dni" value="{{ old('dni', $dni ?? '') }}" placeholder="Ingrese DNI" id="dni" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-pastel2">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <form action="{{ route('registro.store') }}" method="POST" enctype="multipart/form-data" id="form-dni">
                    @csrf
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="dni" value="{{ old('dni', $dni ?? '') }}" placeholder="Ingrese DNI" id="dni" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombre</label>
                        <input type="text" class="form-control" name="nombres" value="{{ old('nombres', $nombres ?? '') }}" placeholder="Ingrese nombres" id="nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="apel_paterno">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apel_paterno" value="{{ old('apel_paterno', $apel_paterno ?? '') }}" placeholder="Ingrese apellido paterno" id="apel_paterno" required>
                    </div>
                    <div class="form-group">
                        <label for="apel_materno">Apellido Materno</label>
                        <input type="text" class="form-control" name="apel_materno" value="{{ old('apel_materno', $apel_materno ?? '') }}" placeholder="Ingrese apellido materno" id="apel_materno" required>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-pastel2">Guardar</button>
                        <a href="{{ url('registro/') }}" class="btn btn-pastel1">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
