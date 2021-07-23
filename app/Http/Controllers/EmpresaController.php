<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empleado;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
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
        $empresas = Empresa::where('estado', '=', 1)->get();

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
            $empresa->logoTipo  = $img['message'];
            $empresa->url = $request->txtUrl;
            $empresa->save();

            return $this->messageRedirect('empresa.index', true, 'Empresa registrada Exitosamente');


        }catch (\Exception $ex) {
            //Si ocurre un error al guardar data, elimina la foto que fue guardada previamente
            $this->deleteFile($img['message']);
            return $this->messageRedirect('empresa.create', false, 'Se presentó un error al tratar de guardar los datos');

        } catch (\Throwable $ex) {
            $this->deleteFile($img['message']);
            return $this->messageRedirect('empresa.create', false, 'Se presentó un error al tratar de guardar los datos');

        }catch (QueryException $ex){

            $this->deleteFile($img['message']);
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
        return view('empresas.edit', ['empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {

        //Se toma el logo antiguo
        $img = $empresa->logoTipo;


        //Si existe un nuevo logo, entonces se registra
        if ($request->hasFile('imgLogo')) {
            $imgNew = $this->SaveArchivoStorage($request->imgLogo, rand() . time(), '/documentos/logos/');

            #valida si ocurrio un error
            if(!$imgNew['status']){
                return $this->messageRedirect('empresa.edit', false, 'Error al guardar nuevo Logo');
            }

            $img = $imgNew['message'];

        }


        try {

            #Actualiza la empresa
            $updateEmpresa = Empresa::find($empresa->id);
            $updateEmpresa->nombre = $request->txtNombre;
            $updateEmpresa->email = $request->txtEmail;
            $updateEmpresa->logoTipo  = $img;
            $updateEmpresa->url = $request->txtUrl;

            $updateEmpresa->save();



            //Si llega a este punto es porque todo salio bien y elimina el logo antiguo
            if ($request->hasFile('imgLogo')){
                $this->deleteFile($empresa->logoTipo);
            }


            return $this->messageRedirect('empresa.index', true, 'La informacion fue actualizada Exitosamente');

        }catch (\Exception $ex) {
            //Si ocurre un error al guardar data, elimina la foto que fue guardada previamente
            ($request->hasFile('imgLogo'))? $this->deleteFile($img) : '';
            return $this->messageRedirect('empresa.edit', false, 'Se presentó un error al tratar de guardar los datos');

        } catch (\Throwable $ex) {
            ($request->hasFile('imgLogo'))? $this->deleteFile($img) : '';
            return $this->messageRedirect('empresa.edit', false, 'Se presentó un error al tratar de guardar los datos');

        }catch (QueryException $ex)
        {
            ($request->hasFile('imgLogo'))? $this->deleteFile($img) : '';
            return $this->messageRedirect('empresa.edit', false, 'Se presentó un error al tratar de guardar los datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //Solo utilizare eliminacion logica, para no perjudicar al listado de empleados al eliminar la informacion
        try {

            //$empresa->delete();
            DB::transaction(function () use($empresa) {

                #Actualiza estado empresa
                $deleteEmpresa = Empresa::find($empresa->id);
                $deleteEmpresa->estado = 0;
                $deleteEmpresa->save();

                #Actualiza estado empleados
                //Empleado::where('idEmpresa', $empresa->id)->delete();
                Empleado::where('idEmpresa', $empresa->id)->update(['estado' => 0]);

            }, 2);

            return $this->messageRedirect('empresa.index', true, 'La empresa fue eliminada exitosamente');

        }catch (\Exception $ex) {
            return $this->messageRedirect('empresa.index', false, 'Se presentó un error al tratar de Eliminar la empresa');
        }


    }
}
