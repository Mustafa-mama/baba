<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function addImages()
    {

        // $images = Slider::get(['photo']);
        return view('admin.sliders.images.create');
    }

    //to save images to folder only
    public function saveSliderImages(Request $request)
    {

        $file = $request->file('dzfile');
        $filename = uploadImage('sliders', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }

    public function saveSliderImagesDB(Request $request)
    {
        return $request;

        // try {
        //    // save dropzone images
        //     if ($request->has('document') && count($request->document) > 0) {
        //         foreach ($request->document as $image) {
        //             Slider::create([
        //                 'imge' => $image,
        //             ]);
        //         }
        //     }
           

        //     return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        // } catch (\Exception $ex) {

        // }
    }
}
