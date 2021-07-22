<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends FuncionesController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::get();

        #dd($empresas);
        return view("empresas.index", get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("empresas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {

        $validated = $request->validate([
            'imgLogo' => 'required',
        ]);

        $img = $this->SaveArchivoStorage($request->imgLogo, rand() . time(), '/documentos/logos/');

        if(!$img['status']){
            return $this->messageRedirect('empresa.create', false, 'Error al guardar Logo');
        }
        try {
            $empresa = new Empresa();
            $empresa->nombre = $request->txtNombre;
            $empresa->email = $request->txtEmail;
            $empresa->logoTipo = $img['message'];
            $empresa->url = $request->txtUrl;
            $empresa->save();

            return $this->messageRedirect('empresa.index', true, 'Empresa registrada Exitosamente');


        }catch (\Exception $ex) {
            return $this->messageRedirect('empresa.create', false, 'Se presentó un error al tratar de guardar los datos');

        } catch (\Throwable $ex) {
            return $this->messageRedirect('empresa.create', false, 'Se presentó un error al tratar de guardar los datos');

        }catch (QueryException $ex)
        {
            return $this->messageRedirect('empresa.create', false, 'Se presentó un error al tratar de guardar los datos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
