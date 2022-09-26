<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Afiliado;
use App\Models\user;

class AfiliadoController extends Controller
{
//Persmisos
public function __construct(){
    $this->middleware('permission:afiliado.index|afiliado.crear|afiliado.editar|afiliado.eliminar',['only'=>['index']]);
    $this->middleware('permission:afiliado.crear',['only'=>['create','store']]);
    $this->middleware('permission:afiliado.crearIndividual',['only'=>['createIndividual']]);
    $this->middleware('permission:afiliado.editar',['only'=>['edit','update']]);
    $this->middleware('permission:afiliado.eliminar',['only'=>['destroy']]);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        $afiliados = Afiliado::nombre($nombre,$apellido)
                        ->paginate(3);

        return view('afiliados.index',compact('afiliados','nombre','apellido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('afiliados.crear');
    }

    public function createIndividual()
    {
        return view('afiliados.crearIndividual');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'proceso'=>'required',
            'numero_de_cedula'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'genero'=>'required',
            'fecha_de_nacimiento'=>'required',
            'estado_civil'=>'required',
            'numero_de_telefono'=>'required',
            'correo_electronico'=>'required',
            'direccion_de_habitacion'=>'required',
            'fecha_de_ingreso'=>'required',
            'estatus_laboral'=>'required',
            'planificacion_hijos'=>'required',
            'condiciones_de_salud'=>'required',
        ]);


        $afiliado = new Afiliado();
        if(Auth::user()->hasRole('Administrador')){
            $user=User::create([
                'name' => $request->nombres.' '.$request->apellidos,
                'email' => $request->correo_electronico,
                'password' => bcrypt($request->numero_de_cedula)
            ])->assignRole('Afiliado');

            $afiliado->user_id= $user->id;
        }else{
            $afiliado->user_id= Auth::id();
        }

        $afiliado->proceso = $request->proceso;
        $afiliado->numero_de_cedula= $request->numero_de_cedula;
        $afiliado->nombres= $request->nombres;
        $afiliado->apellidos= $request->apellidos;
        $afiliado->foto = $request->foto;
        $afiliado->genero= $request->genero;
        $afiliado->fecha_de_nacimiento= $request->fecha_de_nacimiento;
        $afiliado->estado_civil= $request->estado_civil;
        $afiliado->numero_de_telefono= $request->numero_de_telefono;
        $afiliado->numero_de_celular= $request->numero_de_celular;
        $afiliado->correo_electronico= $request->correo_electronico;
        $afiliado->direccion_de_habitacion= $request->direccion_de_habitacion;
        $afiliado->fecha_de_ingreso= $request->fecha_de_ingreso;
        $afiliado->estatus_laboral= $request->estatus_laboral;//1.Activo= $request->; 2.Jubilado
        $afiliado->fecha_afiliacion= $request->fecha_afiliacion;
        $afiliado->numero_de_carnet= $request->numero_de_carnet;
        $afiliado->planificacion_hijos= $request->planificacion_hijos;
        $afiliado->condiciones_de_salud= $request->condiciones_de_salud;

        $afiliado->save();

        if(Auth::user()->hasRole('Administrador')){
            return redirect()->route('afiliado.index')->with('success','Registro creado exitosamente');
        }else{
            return redirect()->route('afiliado.edit',compact('afiliado'));
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $afiliado = Afiliado::find($id);
        return view('afiliados.editar', compact('afiliado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'proceso'=>'required',
            'numero_de_cedula'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'genero'=>'required',
            'fecha_de_nacimiento'=>'required',
            'estado_civil'=>'required',
            'numero_de_telefono'=>'required',
            'correo_electronico'=>'required',

            'direccion_de_habitacion'=>'required',
            'fecha_de_ingreso'=>'required',
            'estatus_laboral'=>'required',
            'planificacion_hijos'=>'required',
            'condiciones_de_salud'=>'required',
        ]);



        $afiliado = Afiliado::find($id);

        $afiliado->user_id= $afiliado->user_id;
        $afiliado->proceso = $request->proceso;
        $afiliado->numero_de_cedula= $request->numero_de_cedula;
        $afiliado->nombres= $request->nombres;
        $afiliado->apellidos= $request->apellidos;
        $afiliado->foto = $request->foto;
        $afiliado->genero= $request->genero;
        $afiliado->fecha_de_nacimiento= $request->fecha_de_nacimiento;
        $afiliado->estado_civil= $request->estado_civil;
        $afiliado->numero_de_telefono= $request->numero_de_telefono;
        $afiliado->numero_de_celular= $request->numero_de_celular;
        $afiliado->correo_electronico= $request->correo_electronico;
        $afiliado->direccion_de_habitacion= $request->direccion_de_habitacion;
        $afiliado->fecha_de_ingreso= $request->fecha_de_ingreso;
        $afiliado->estatus_laboral= $request->estatus_laboral;//1.Activo= $request->; 2.Jubilado
        $afiliado->fecha_afiliacion= $request->fecha_afiliacion;
        $afiliado->numero_de_carnet= $request->numero_de_carnet;
        $afiliado->planificacion_hijos= $request->planificacion_hijos;
        $afiliado->condiciones_de_salud= $request->condiciones_de_salud;

        $afiliado->update();

        return redirect()->route('afiliado.index')->with('success','Registro actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $afiliado = Afiliado::find($id);
        $user = User::where('id','=',$afiliado->user_id);
       // dd($user);

        $afiliado->delete();
        $user->delete();
        return redirect()->route('afiliado.index')->with('destroy','Registro eliminado exitosamente');
    }
}
