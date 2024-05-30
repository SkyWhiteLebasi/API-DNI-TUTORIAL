<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

   
    </head>
    <body class="antialiased">
<h4 style="color: #01729a"><b> Lista de Registro de Productos</b></h4>
    <div class="row">
        <div class="col-6">

                <a href="{{ url('registro/create') }}" type="button" class="btn btn-pastel1"> <i class="fas fa-folder-plus"></i>
                    Crear
                </a>

        </div>
        <div class="col-6">
            <form method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Ingrese texto a buscar">
                    <div class="input-group-append">
                        <button class="btn btn-pastel5" type="submit"><i class="fas fa-search"></i>
                            Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    <link rel="stylesheet" href="css/pasteles.css">
    <div class="row justify-content-md-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table" id="producto">
                        <thead class="myhead">

                            <tr>
                    
                        
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>APELLIDO P</th>
                                <th>APELLIDO M</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($registros->isNotEmpty())
                                @foreach ($registros as $registro)
                                    <tr>



                 

                                        <td> {{ $registro->dni }} </td>
                                        <td> {{ $registro->nombres }} </td>
                                        <td> {{ $registro->apel_paterno }} </td>
                                        <td> {{ $registro->apel_materno }} </td>
               
                                        <td>
                           
                                            <a href="{{ url('/registro/'.$registro->id.'/edit'),  }}" class="btn btn-pastel1"><i class="fas fa-pencil-alt"></i> Editar</a>	
                
                                       
                                            <form action="{{ url('/registro/'.$registro->id) }}"  class="d-inline form-eliminar" method ="POST">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-pastel4"><i class="fas fa-trash-alt"></i> Borrar</button>	
                                            </form>
                            
                                        </td>
                                        {{-- @endif --}}
                                    </tr>
                                @endforeach
                            @else
                                <h5>No se encontro resultados</h5>

                            @endif

                        </tbody>

                    </table>
                    </div>
                </div>
                <div class="card-footer bg-warning" >
                    <h6><b>Especificaciones para las columnas de las tablas</b></h6> 
                    <small class="text-muted">Nombre de la tabla para inserta en excel: <b>codigo de producto, nombre producto, medida, categoria, stock, condicion, observacion</b></small> 
                </div>
            </div>

        </div>

    </div>
</body>
</html>

