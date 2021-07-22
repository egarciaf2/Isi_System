<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;


class FuncionesController extends Controller
{


    /**
     * Funcion para guardar documentos en disco
     * @param $archivo
     * @param $nameFile
     * @param $ruta
     * @return array
     */
    public function SaveArchivoStorage($archivo, $nameFile, $ruta)
    {

        try {

            $extensiones = ['jpg', 'png', 'jpeg'];

            $file = $archivo;
            $path = $file->getClientOriginalName();

            $valida = $this->ValidaExtension($extensiones, $path);

            if (isset($valida['status']) && $valida['status'] == true) {

                $nombreArchivo = $nameFile . '.' . $valida['extension'];

                if (Storage::put($ruta . $nombreArchivo, file_get_contents($file)))
                    return ['status' => true, 'message' => $ruta . $nombreArchivo];
                else
                    return ['status' => false, 'message' => 'No fue posible almacenar el archivo.'];
            } else {
                return ['status' => false, 'message' => 'La extensión del archivo no es válida.'];
            }

        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Ocurrio un error al almacenar el archivo.'];
        }
    }

    /**
     * Validación de Extensiones de archivos
     * @param $extensiones
     * @param $path
     * @return array
     */
    public function ValidaExtension($extensiones, $path)
    {
        $item = explode('.', $path);
        $ext = array_pop($item);
        $flag = false;
        foreach ($extensiones as $extension) {
            if (strcasecmp($ext, $extension) == 0) {
                $flag = true;
                break;
            } else {
                $flag = false;
            }
        }

        $response = ["status" => $flag, "extension" => strtolower($ext)];

        return $response;
    }

    /**
     * Muestra imagen almacenada en storage
     * @param $request
     * @return Response
     */

    public function showImg(Request $request)
    {
        $ruta = $request->ruta;

        try {

            if (Storage::disk('local')->exists($ruta)) {

                $tipo = Storage::mimeType($ruta);

                $archivo = Response::make(Storage::get($ruta), 200, [
                    'Content-Type' => $tipo,
                    'Content-Disposition' => 'inline; filename="' . $ruta . '"'
                ]);

                return $archivo;

            } else {

                return $this->showImgDefault();

            }

        } catch (FileNotFoundException $e) {
            return $this->showImgDefault();
        }
    }

    /**
     * Retorna img por defecto
     * @return Response
     *
     */
    private function showImgDefault()
    {
        $ruta = Config('constantes.no_img');

        $tipo = Storage::mimeType($ruta);

        $archivo = Response::make(Storage::get($ruta), 200, [
            'Content-Type' => $tipo,
            'Content-Disposition' => 'inline; filename="' . $ruta . '"'
        ]);

        return $archivo;
    }

    /**
     * Retorna vista con variable de session
     * @param $ruta
     * @param $status
     * @param $message
     * @return view() and with()
     *
     */
    public function messageRedirect($ruta, $status, $message)
    {
        return redirect()->route($ruta)->with(['status' => $status, 'message' => $message]);
    }

    /**
     * Elimina Documentos del Disco
     * @param $url
     * @return bool
     *
     */
    public function deleteFile($url)
    {
        $contenido = Storage::disk('local')->delete($url);

        return $contenido;
    }

}
