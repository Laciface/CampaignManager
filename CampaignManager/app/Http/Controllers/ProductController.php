<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function displayProductForm(){
        return view('addProduct');
    }

    public function addProduct(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');

        $image = $request->file('picture');
        $fileName = str_replace(' ', '', $request->input('name')) . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(120, 120, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('local')->put('public/images/'. $fileName, $img);

        $arrayToInsert = array('name'=>$name, 'description' =>$description, 'picture' => $fileName);
        DB::table('products')->insert($arrayToInsert);

        return redirect()->route('displayCampaigns');
    }
}
