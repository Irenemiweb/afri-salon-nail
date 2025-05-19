<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImageNewService;
use Illuminate\Support\Facades\Storage;
class DeleteTemporaryImageNewServiceController extends Controller
{
    public function __invoke(){
        $temporaryImage = TemporaryImageNewService::where('folder', request()->getContent())->first();
        $idUser =  auth()->id();
        // $temporaryImage = TemporaryImageNewService::where('folder', request()->getContent())
        //                                   ->where('id_user', auth()->id())
        //                                   ->first();
        if($temporaryImage){
            Storage::deleteDirectory('imagesServices_/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }
        return response()->noContent();
    }
}
