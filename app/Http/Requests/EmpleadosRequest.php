<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtNombre' => 'required',
            'txtApellido' => 'required',
            'slcEmpresa' => 'required',
            'txtEmail' => 'required|email|unique:empleados,email',
            'txtTelefono' => 'required|min:8|max:8'
        ];
    }

    public function messages()
    {
        return [
            'txtNombre.required' => 'El campo Nombre es requerido',
            'txtApellido.required' => 'El campo Apellido es requerido',
            'slcEmpresa.required' => 'Debe seleccionar una empresa',
            'txtEmail.required' => 'El campo Correo Electronico es requerido',
            'txtEmail.email' => 'El Correo electronico es incorrecto',
            'txtEmail.unique' => 'El Correo electronico ya existe en el sistema',
            'txtTelefono.required' => 'El campo Telefono es requerido',
            'txtTelefono.min' => 'El campo Telefono debe tener 8 digitos',
            'txtTelefono.max' => 'El campo Telefono debe tener 8 digitos',
        ];
    }
}
