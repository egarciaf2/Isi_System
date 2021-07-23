<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadosRequest;
use App\Models\Empleado;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmpleadoController extends FuncionesController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::where('estado', '=', 1)
            ->with('Empresa')
            ->get();
        return view("empleados.index", get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::where('estado', '=', 1)->get();

        return view("empleados.create", get_defined_vars());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadosRequest $request)
    {

        try {

            $empleado = new Empleado();
            $empleado->idEmpresa = $request->slcEmpresa;
            $empleado->nombre = $request->txtNombre;
            $empleado->apellido = $request->txtApellido;
            $empleado->email = $request->txtEmail;
            $empleado->telefono = $request->txtTelefono;
            $empleado->save();
            return $this->messageRedirect('empleado.index', true, 'Empleado registrado Exitosamente');


        }catch (\Exception $ex) {
            return $this->messageRedirect('empleado.create', false, 'Se presentó un error al tratar de guardar los datos');

        } catch (\Throwable $ex) {
            return $this->messageRedirect('empleado.create', false, 'Se presentó un error al tratar de guardar los datos');

        }catch (QueryException $ex) {
            return $this->messageRedirect('empleado.create', false, 'Se presentó un error al tratar de guardar los datos');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $empresas = Empresa::where('estado', '=', 1)->get();

        return view('empleados.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadosRequest $request, Empleado $empleado)
    {

        try {

            $empleado = Empleado::find($empleado->id);
            $empleado->idEmpresa = $request->slcEmpresa;
            $empleado->nombre = $request->txtNombre;
            $empleado->apellido = $request->txtApellido;
            $empleado->email = $request->txtEmail;
            $empleado->telefono = $request->txtTelefono;
            $empleado->save();
            return $this->messageRedirect('empleado.index', true, 'Empleado Actualizado Exitosamente');


        } catch (\Exception $ex) {
            return $this->messageRedirect('empleado.create', false, 'Se presentó un error al tratar de Actualizar los datos');

        } catch (\Throwable $ex) {
            return $this->messageRedirect('empleado.create', false, 'Se presentó un error al tratar de Actualizar los datos');

        } catch (QueryException $ex) {
            return $this->messageRedirect('empleado.create', false, 'Se presentó un error al tratar de Actualizar los datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
