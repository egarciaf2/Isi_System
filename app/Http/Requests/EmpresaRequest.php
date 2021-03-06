<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'imgLogo' => 'image|max:5120', // peso maximo de 5 mb
            'txtNombre' => 'required',
            'txtEmail' => 'required|email',
            'txtUrl' => 'required|active_url'
        ];
    }

    public function messages()
    {
        return [
            'imgLogo.required' => 'El logo de la empresa es requerido',
            'imgLogo.image' => 'EL Formato del archivo es incorrrecto, solo se admite, PNG, JPG, jpeg',
            //'imgLogo.max:5120' => 'La imagen es demaciado pesada, debe tener un peso maximo de 5MB', // peso maximo de 5 mb
            'txtNombre.required' => 'El campo Nombre es requerido',
            'txtEmail.required' => 'El Correo Electronico es requerido',
            'txtEmail.email' => 'El formato de Correo electronico es incorrecto',
            'txtUrl.required' => 'La Url de la empresa es requerida',
            'txtUrl.active_url' => 'La Url es invalida, el formato debe ser http://ejemplo.com'
        ];
    }

}
