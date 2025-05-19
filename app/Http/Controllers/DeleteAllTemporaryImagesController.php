<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImageNewService;
use Illuminate\Support\Facades\Storage;

class DeleteAllTemporaryImagesController extends Controller
{
    public function __invoke(){
        $idUser = auth()->id();
        $temporaryImages = TemporaryImageNewService::where('id_user', $idUser)->get(); // Usar ->get() para obtener todos

        if($temporaryImages->isNotEmpty()) { // Verificar si hay imágenes temporales
            foreach ($temporaryImages as $temporaryImage) {
                // Eliminar el directorio de cada imagen temporal
                Storage::deleteDirectory('imagesServices_/tmp/' . $temporaryImage->folder);
                $temporaryImage->delete(); // Eliminar el registro de la base de datos
            }
        }
        return response()->noContent();
    }
}
