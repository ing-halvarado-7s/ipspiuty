@extends('adminlte::page')

@section('title', 'Beneficiario')

@section('content_header')
    <h1>Editar Beneficiario</h1>
@stop

@section('content')
<section class="section">

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

                    @if ($errors->any())
                        <div class="alert alert-primary" role="alert">
                        <strong>¡Revise los campos!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><span class="badge badge-danger">{{ $error }}</span></li>
                            @endforeach
                        </ul>



                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif

                    <form action="{{ route('beneficiario.update',$beneficiario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="numero_de_cedula">Número de cédula*</label>
                                        <input type="hidden" name="afiliado_id" id="afiliado_id"  value="{{ $beneficiario->afiliado_id }}" class="form-control" >
                                        <input type="number" name="numero_de_cedula" id="numero_de_cedula"  value="{{ $beneficiario->numero_de_cedula }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="nombres">Nombres*</label>
                                        <input type="text" name="nombres" id="nombres"  value="{{ $beneficiario->nombres }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos*</label>
                                        <input type="text" name="apellidos" id="apellidos"  value="{{ $beneficiario->apellidos }}" class="form-control" >
                                        <input type="hidden"  name="foto" id="foto" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="genero">Género*</label>
                                        <div class="form-check">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <input class="form-check-input" type="radio" name="genero" id="generoF" value="Femenino" {{ $beneficiario->genero == "Femenino" ? 'checked' : '' }} >
                                                    <label class="form-check-label" for="generoF">Femenino</label>
                                                </div>
                                                <div class="col-sm"><input class="form-check-input" type="radio" name="genero" id="generoM" value="Masculino" {{ $beneficiario->genero == "Masculino" ? 'checked' : '' }} >
                                                    <label class="form-check-label" for="generoM">Masculino</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="fecha_de_nacimiento">Fecha de nacimiento*</label>
                                        <input type="date" name="fecha_de_nacimiento" id="fecha_de_nacimiento"  value="{{ $beneficiario->fecha_de_nacimiento }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="parentesco">Parentesco*</label>
                                        <select class="custom-select" name="parentesco" id="parentesco">
                                            <option disabled selected>Selecciona una opción</option>
                                            <option value="Esposa" {{ $beneficiario->parentesco == "Esposa" ? 'selected' : '' }}>Esposa</option>
                                            <option value="Esposo" {{ $beneficiario->parentesco == "Esposo" ? 'selected' : '' }}>Esposo</option>
                                            <option value="Madre" {{ $beneficiario->parentesco == "Madre" ? 'selected' : '' }}>Madre</option>
                                            <option value="Padre" {{ $beneficiario->parentesco == "Padre" ? 'selected' : '' }}>Padre</option>
                                            <option value="Hija" {{ $beneficiario->parentesco == "Hija" ? 'selected' : '' }}>Hijo</option>
                                            <option value="Hijo" {{ $beneficiario->parentesco == "Hijo" ? 'selected' : '' }}>Hija</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="numero_de_telefono">Número de teléfono*</label>
                                        <input type="text" name="numero_de_telefono" id="numero_de_telefono"  value="{{ $beneficiario->numero_de_telefono }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="numero_de_celular">Número de celular</label>
                                        <input type="text" name="numero_de_celular" id="numero_de_celular"  value="{{ $beneficiario->numero_de_celular }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check"><label for="planificacion_hijos">Planifica tener hijos*</label>                                            <div class="row">
                                            <div class="col-sm"><div class="col-sm">
                                            <input class="form-check-input" type="radio" name="planificacion_hijos" id="planificacion_hijos_si" value="Si" {{ $beneficiario->planificacion_hijos == "Si" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="planificacion_hijos">Si</label>
                                        </div></div>
                                            <div class="col-sm"><div class="col-sm">
                                            <input class="form-check-input" type="radio" name="planificacion_hijos" id="planificacion_hijos_no" value="No" {{ $beneficiario->planificacion_hijos == "No" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="planificacion_hijos">No</label>
                                        </div></div>
                                        <div class="col-8"></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="condiciones_de_salud">Condiciones de salud/ Enfermedades preexistentes/ Tratamiento médico actual*</label>
                                <textarea class="form-control" id="condiciones_de_salud" name="condiciones_de_salud" rows="3">{{ $beneficiario->condiciones_de_salud }}</textarea>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>

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
