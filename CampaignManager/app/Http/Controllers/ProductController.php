<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function displayProductForm(){
        return view('createProduct');
    }

    public function createProduct(Request $request){
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

        $arrayToInsert = array('name'=>$name, 'description' => $description, 'picture' => $fileName);
        DB::table('products')->insert($arrayToInsert);

        return redirect()->route('displayCampaigns');
    }

    public function addProductToCampaign(Request $request, $id){
        $productId = $request->input('productId');
        $productIdList = Campaign::where('id', $id)->value('products');
        if($productIdList == null){
            DB::table('campaigns')->where('id', $id)->update(['products'=> array($productId)]);
        } else {
            array_push($productIdList, $productId);
            DB::table('campaigns')->where('id', $id)->update(['products'=> $productIdList]);
        }

        /*DB::table('campaigns')->where('id', $id)->update(['products'=> array($productId)]);*/

        header("Location: http://localhost:8000/campaignHandler/$id", true);
        die();
    }
}
