<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Afiliado;
use App\Models\Beneficiario;
use App\Models\user;

class BeneficiarioController extends Controller
{
//Persmisos
public function __construct(){
    $this->middleware('permission:beneficiario.index|beneficiario.crear|beneficiario.editar|beneficiario.eliminar',['only'=>['indexBeneficiario']]);
    $this->middleware('permission:beneficiario.crear',['only'=>['createBeneficiario','store']]);
    $this->middleware('permission:beneficiario.editar',['only'=>['edit','update']]);
    $this->middleware('permission:beneficiario.eliminar',['only'=>['destroy']]);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function indexBeneficiario(Request $request,$afiliado_id)
    {
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        $beneficiarios = Beneficiario::nombre($nombre,$apellido)
                        ->where('afiliado_id', $afiliado_id)
                        ->paginate(3);
        $afiliado = Afiliado::find($afiliado_id);
        return view('beneficiarios.index',compact('beneficiarios','nombre','apellido','afiliado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function createBeneficiario($afiliado_id)
    {
        $afiliado = Afiliado::find($afiliado_id);
       // dd($afiliado->id);
        return view('beneficiarios.crear',compact('afiliado'));
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
            'numero_de_cedula'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'genero'=>'required',
            'fecha_de_nacimiento'=>'required',
            'parentesco'=>'required',
            'numero_de_telefono'=>'required',
            'planificacion_hijos'=>'required',
            'condiciones_de_salud'=>'required',
        ]);



        $beneficiario = new Beneficiario();

        $beneficiario->afiliado_id= $request->afiliado_id;
        $beneficiario->numero_de_cedula= $request->numero_de_cedula;
        $beneficiario->nombres= $request->nombres;
        $beneficiario->apellidos= $request->apellidos;
        $beneficiario->foto = $request->foto;
        $beneficiario->genero= $request->genero;
        $beneficiario->fecha_de_nacimiento= $request->fecha_de_nacimiento;
        $beneficiario->parentesco= $request->parentesco;
        $beneficiario->numero_de_telefono= $request->numero_de_telefono;
        $beneficiario->numero_de_celular= $request->numero_de_celular;
        $beneficiario->planificacion_hijos= $request->planificacion_hijos;
        $beneficiario->condiciones_de_salud= $request->condiciones_de_salud;

        $beneficiario->save();

        $afiliado_id=$request->afiliado_id;
        return redirect()->route('beneficiario.indexBeneficiario',compact('afiliado_id'))->with('success','Registro creado exitosamente');



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
        $beneficiario = Beneficiario::find($id);
        $afiliado = Afiliado::find($beneficiario->afiliado_id);
        return view('beneficiarios.editar', compact('beneficiario','afiliado'));
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
            'numero_de_cedula'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'genero'=>'required',
            'fecha_de_nacimiento'=>'required',
            'parentesco'=>'required',
            'numero_de_telefono'=>'required',
            'planificacion_hijos'=>'required',
            'condiciones_de_salud'=>'required',
        ]);



        $beneficiario = Beneficiario::find($id);

        $beneficiario->afiliado_id= $request->afiliado_id;
        $beneficiario->numero_de_cedula= $request->numero_de_cedula;
        $beneficiario->nombres= $request->nombres;
        $beneficiario->apellidos= $request->apellidos;
        $beneficiario->foto = $request->foto;
        $beneficiario->genero= $request->genero;
        $beneficiario->fecha_de_nacimiento= $request->fecha_de_nacimiento;
        $beneficiario->parentesco= $request->parentesco;
        $beneficiario->numero_de_telefono= $request->numero_de_telefono;
        $beneficiario->numero_de_celular= $request->numero_de_celular;
        $beneficiario->planificacion_hijos= $request->planificacion_hijos;
        $beneficiario->condiciones_de_salud= $request->condiciones_de_salud;

        $beneficiario->update();

        $afiliado_id=$request->afiliado_id;
        return redirect()->route('beneficiario.indexBeneficiario',compact('afiliado_id'))->with('success','Registro actualizado exitosamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beneficiario = Beneficiario::find($id);
        $afiliado_id=$beneficiario->afiliado_id;

        //dd($afiliado_id);
        $beneficiario->delete();
        return redirect()->route('beneficiario.indexBeneficiario',compact('afiliado_id'))->with('destroy','Registro eliminado exitosamente');
    }
}
