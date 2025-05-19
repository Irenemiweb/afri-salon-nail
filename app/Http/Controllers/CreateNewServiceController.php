<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\TemporaryImageNewService;
use App\Models\Servicio;
use App\Models\ImageNewService;

class CreateNewServiceController extends Controller
{
    public function createNewService(Request $request){
        // dd($request->all());
        switch ($request->input('action')) {
            case 'create':
                // dd($request->all());
                $validator = Validator::make($request->all(), [
                    'nombreServicio' => 'required',
                    'descripcionServicio' => 'required',
                ]);
                $temporaryImages = TemporaryImageNewService::all();
                if($validator->fails()){
                    foreach ($temporaryImages as $temporaryImage) {
                        Storage::deleteDirectory('imagesServices_/tmp/' . $temporaryImage->folder);
                        $temporaryImage->delete();
                    }
                   // Redirigir al usuario de vuelta al formulario con los errores
                   return redirect()->route('admin.configCreate');
                }
                $colorNewService = $request->colorServicio;
                if ( $colorNewService === null ||  $colorNewService === 'randomColor') {
                    $r = rand(0, 255);
                    $g = rand(0, 255);
                    $b = rand(0, 255);
                    $colorNewService = "rgb($r, $g, $b)";
                }
                // $categoryService = $request->
                $newService = Servicio::create([
                    'nombre' => $request->nombreServicio,
                    'descripcion' => $request->descripcionServicio,
                    'categoria' => $request->categoryService,
                    'precio' => $request->precioServicio,
                    'borderColor' => $request->colorServicio,
                    'horaNewService' => $request->horaNewService,
                    'minutosNewService' => $request->minutosNewService,
                    'tipoPrecioNewService' => $request->tipoPrecioNewService,
                ]);
                foreach ($temporaryImages as $temporaryImage) {
                    Storage::copy('imagesServices_/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file, 'imagesNewServices/' . $temporaryImage->folder . '/' . $temporaryImage->file);
                    ImageNewService::create([
                        'servicio_id' => $newService->id,
                        'name' => $temporaryImage->file,
                        'path' => $temporaryImage->folder . '/' . $temporaryImage->file
                    ]);
                    $temporaryImage->delete();
                }
                Storage::deleteDirectory('imagesServices_/tmp/');
                return redirect()->route('admin.showAllServices')->with('success', 'Formulario enviado correctamente');
                break;
            case 'modify':
                // dd($request->all());
               // Buscar el servicio que quieres modificar
                $service = Servicio::findOrFail($request->id_serviceModify);

                // Actualizar los campos del servicio
                $service->update([
                    'nombre' => $request->nombreServicio,
                    'descripcion' => $request->descripcionServicio,
                    'categoria' => $request->categoryService,
                    'precio' => $request->precioServicio,
                    'borderColor' => $request->colorServicio,
                    'horaNewService' => $request->horaNewService,
                    'minutosNewService' => $request->minutosNewService,
                    'tipoPrecioNewService' => $request->tipoPrecioNewService,
                ]);

                return redirect()->route('admin.showAllServices')->with('success', 'Servicio Modificado correctamente');
                break;
            case 'delete':
                $service = Servicio::findOrFail($request->id_serviceModify);

                // Eliminar el servicio
                $service->activo = 'no';
                $service->save();
                return redirect()->route('admin.showAllServices')->with('success', 'Servicio Eliminado correctamente');
                break;
        }

    }
}
