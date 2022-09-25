@extends('adminlte::page')

@section('title', 'Afiliado')

@section('content_header')
    <h1>Afiliado</h1>
@stop

@section('content')
<section class="section">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if (session('destroy'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('destroy') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            @can('afiliado.crear')
                                <a class="btn btn-warning" href="{{ route('afiliado.create') }}">Nuevo</a>
                            @endcan
                        </div>

                        <div class="col-sm">
                            <form action="{{ route('afiliado.index') }}" method="get">
                                <div class="input-group float-right">

                                    <input type="search" name="nombre" id="nombre" class="form-control float-right" placeholder="Nombre" value="{{ $nombre }}"/>
                                    <input type="search" name="apellido" id="apellido" class="form-control float-right" placeholder="Apellido" value="{{ $apellido }}"/>


                                    <button type="submit" class="btn btn-primary float-right">
                                    <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (!$afiliados->isEmpty())
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nro. Documento</th>
                                    <th style="color:#fff;">Nombres</th>
                                    <th style="color:#fff;">Apellidos</th>
                                    <th style="color:#fff;">Nro. Teléfono</th>
                                    <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                            @foreach ($afiliados as $afiliado)
                            <tr>
                                <td style="display: none;">{{ $afiliado->id }}</td>
                                <td>{{ $afiliado->numero_de_cedula }}</td>
                                <td>{{ $afiliado->nombres }}</td>
                                <td>{{ $afiliado->apellidos }}</td>
                                <td>{{ $afiliado->numero_de_telefono }}</td>

                                <td>

                                    <form action="{{ route('afiliado.destroy',$afiliados->id) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este registro?');">

                                        @can('afiliado.editar')
                                            <a class="btn btn-info" href="{{ route('afiliado.edit',$afiliados->id) }}">Editar</a>
                                        @endcan



                                        @csrf
                                        @method('DELETE')
                                        @can('afiliado.eliminar')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $afiliados->links() !!}
                        </div>
                    @else
                        <h5>No hay resultados disponibles para su búsqueda</h5>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
