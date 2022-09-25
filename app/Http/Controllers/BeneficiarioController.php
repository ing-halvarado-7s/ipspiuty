<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        $beneficiarios = Beneficiario::nombre($nombre,$apellido)
                        ->paginate(3);

        return view('beneficiarios.index',compact('beneficiarios','nombre','apellido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beneficiarios.crear');
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
            'tipo_documento'=>'required',
            'numero_documento'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'fecha_nacimiento'=>'required',
            'estado_civil'=>'required',
            'nacionalidad'=>'required',
            'numero_celular'=>'required',
            'otro_numero_celular'=>'required',
            'correo_electronico'=>'required',
            'provincia'=>'required',
            'municipio'=>'required',
            'localidad_barrio'=>'required',
            'direccion_domicilio'=>'required',
            'numero_afiliacion'=>'required',
            //'obra_social_id'=>'required',
            'profesion_actividad'=>'required',
            'titular'=>'required',
            'lugar_trabajo'=>'required',
            'jerarquia'=>'required',
        ]);

        //Obtener el id del usuario que esta activo en ese momento
        $id_usuario = Auth::id();

        $beneficiario = new Beneficiario();


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
