@extends('adminlte::page')

@section('title', 'Beneficiario')

@section('content_header')
    <h1>Beneficiario</h1>
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
            <div class="col-sm">
                <h5> <b> Afiliado:</b> {{ $afiliado->nombres }} {{ $afiliado->apellidos }}. <b>Teléfono:</b> {{ $afiliado->numero_de_telefono }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            @can('beneficiario.crear')
                                <a class="btn btn-warning" href="{{ route('beneficiario.createBeneficiario',$afiliado->id) }}">Nuevo</a>
                            @endcan
                        </div>

                        <div class="col-sm">
                            <form action="{{ route('beneficiario.indexBeneficiario',$afiliado->id) }}" method="get">
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
                    @if (!$beneficiarios->isEmpty())
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
                            @foreach ($beneficiarios as $beneficiario)
                            <tr>
                                <td style="display: none;">{{ $beneficiario->id }}</td>
                                <td>{{ $beneficiario->numero_de_cedula }}</td>
                                <td>{{ $beneficiario->nombres }}</td>
                                <td>{{ $beneficiario->apellidos }}</td>
                                <td>{{ $beneficiario->numero_de_telefono }}</td>

                                <td>

                                    <form action="{{ route('beneficiario.destroy',$beneficiario->id) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este registro?');">

                                        @can('beneficiario.editar')
                                            <a class="btn btn-info" href="{{ route('beneficiario.edit',$beneficiario->id) }}">Editar</a>
                                        @endcan



                                        @csrf
                                        @method('DELETE')
                                        @can('beneficiario.eliminar')
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
                            {!! $beneficiarios->links() !!}
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
