<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImageNewService;
use Illuminate\Support\Facades\Auth;

class UploadTemporaryImageNewServiceController extends Controller
{
   public function __invoke(Request $request){
    if($request->hasfile('image')){
        $userId = auth()->id();
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $folder = uniqid('image-', true);
        $image->storeAs('imagesServices_/tmp/' . $folder, $filename);

        TemporaryImageNewService::create([
            'folder' => $folder,
            'file' => $filename,
            'id_user' => $userId
        ]);

        return $folder;
    }
    return '';
   }
}
