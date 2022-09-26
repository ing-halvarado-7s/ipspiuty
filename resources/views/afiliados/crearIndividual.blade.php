@extends('adminlte::page_no_menu')

@section('title', 'Afiliado')

@section('content_header')
    <h1>Crear Afiliado</h1>
@stop

@section('content')
<section class="section">

    <div class="section-body">
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

                <form action="{{ route('afiliado.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="proceso">Proceso*</label>
                                        <select class="custom-select" name="proceso" id="proceso">
                                            <option disabled selected>Selecciona una opción</option>
                                            <option value="Nuevo" {{ old('proceso') == "Nuevo" ? 'selected' : '' }}>Nuevo Ingreso</option>
                                            <option value="Actualizacion" {{ old('proceso') == "Actualizacion" ? 'selected' : '' }}>Actualización</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="numero_de_cedula">Número de cédula*</label>
                                        <input type="number" name="numero_de_cedula" id="numero_de_cedula"  value="{{ old('numero_de_cedula') }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="nombres">Nombres*</label>
                                        <input type="text" name="nombres" id="nombres"  value="{{ old('nombres') }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos*</label>
                                        <input type="text" name="apellidos" id="apellidos"  value="{{ old('apellidos') }}" class="form-control" >
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
                                                    <input class="form-check-input" type="radio" name="genero" id="generoF" value="Femenino" {{ old('genero') == "Femenino" ? 'checked' : '' }} >
                                                    <label class="form-check-label" for="generoF">Femenino</label>
                                                </div>
                                                <div class="col-sm"><input class="form-check-input" type="radio" name="genero" id="generoM" value="Masculino" {{ old('genero') == "Masculino" ? 'checked' : '' }} >
                                                    <label class="form-check-label" for="generoM">Masculino</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="fecha_de_nacimiento">Fecha de nacimiento*</label>
                                        <input type="date" name="fecha_de_nacimiento" id="fecha_de_nacimiento"  value="{{ old('fecha_de_nacimiento') }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="estado_civil">Estado civil*</label>
                                        <select class="custom-select" name="estado_civil" id="estado_civil">
                                            <option disabled>Selecciona una opción</option>
                                            <option value="Soltero" {{ old('estado_civil') == "Soltero" ? 'selected' : '' }}>Soltero(a)</option>
                                            <option value="Casado"  {{ old('estado_civil') == "Casado" ? 'selected' : '' }}>Casado(a)</option>
                                            <option value="Viudo"   {{ old('estado_civil') == "Viudo" ? 'selected' : '' }}>Viudo(a)</option>
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
                                        <input type="text" name="numero_de_telefono" id="numero_de_telefono"  value="{{ old('numero_de_telefono') }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="numero_de_celular">Número de celular</label>
                                        <input type="text" name="numero_de_celular" id="numero_de_celular"  value="{{ old('numero_de_celular') }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="correo_electronico">Correo electrónico*</label>
                                        <input type="email" name="correo_electronico" id="correo_electronico"  value="{{ old('correo_electronico') }}" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="direccion_de_habitacion">Dirección de habitación*</label>
                                        <textarea class="form-control" name="direccion_de_habitacion" id="direccion_de_habitacion" rows="2">{{ old('direccion_de_habitacion') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="fecha_de_ingreso">Fecha de ingreso*</label>
                                        <input type="date" name="fecha_de_ingreso" id="fecha_de_ingreso"  value="{{ old('fecha_de_ingreso') }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="estatus_laboral">Estatus laboral*</label>
                                        <select class="custom-select" name="estatus_laboral" id="estatus_laboral">
                                            <option disabled>Selecciona una opción</option>
                                            <option value="Activo" {{ old('estatus_laboral') == "Activo" ? 'selected' : '' }}>Activo(a)</option>
                                            <option value="Jubilado" {{ old('estatus_laboral') == "Jubilado" ? 'selected' : '' }}>Jubilado(a)</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="fecha_afiliacion">Fecha de afiliación</label>
                                        <?php $fecha_actual = date('Y-m-d');?>
                                        <input type="date" name="fecha_afiliacion" id="fecha_afiliacion"  value="{{ $fecha_actual }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="numero_de_carnet">Número de carnet</label>
                                        <input type="number" name="numero_de_carnet" id="numero_de_carnet"  value="{{ old('numero_de_carnet') }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <div class="form-check"><label for="planificacion_hijos">Planifica tener hijos*</label>
                                            <div class="row">
                                                <div class="col-sm"><div class="col-sm">
                                                <input class="form-check-input" type="radio" name="planificacion_hijos" id="planificacion_hijos_si" value="Si" {{ old('planificacion_hijos') == "Si" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="planificacion_hijos">Si</label>
                                            </div></div>
                                                <div class="col-sm"><div class="col-sm">
                                                <input class="form-check-input" type="radio" name="planificacion_hijos" id="planificacion_hijos_no" value="No" {{ old('planificacion_hijos') == "No" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="planificacion_hijos">No</label>
                                            </div></div>
                                            <div class="col-8"></div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="condiciones_de_salud">Condiciones de salud/ Enfermedades preexistentes/ Tratamiento médico actual*</label>
                                <textarea class="form-control" id="condiciones_de_salud" name="condiciones_de_salud" rows="3">{{ old('condiciones_de_salud') }}</textarea>
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
