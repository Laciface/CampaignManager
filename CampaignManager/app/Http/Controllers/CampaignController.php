<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Campaign;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function displayCampaignsForm(){
        return view('createCampaign');
    }

    public function displayCampaigns(){
        $campaigns = Campaign::all();
        return view('allCampaign', compact('campaigns'));
    }

    public function createCampaign(Request $request){
        $name = $request->input('name');
        $first_day = $request->input('first_day');
        $last_day = $request->input('last_day');
        if( strtotime($first_day) > strtotime($last_day)) {
            $msg = "Az utolsó nap előbb van mint a kezdő dátum";
            header("Location: http://localhost:8000/campaignForm?msg=$msg");
            die();
        } elseif (strtotime($first_day) < strtotime('now')){
            $msg = "A kezdő dátum a mai napnál nem lehet korábbi";
            header("Location: http://localhost:8000/campaignForm?msg=$msg", true);
            die();
        }

        $status = $request->input('status') == 'accepted';

        $arrayToInsert = array('name'=>$name, 'first_day' =>$first_day, 'last_day' => $last_day, 'approved' => $status);
        DB::table('campaigns')->insert($arrayToInsert);

        return redirect()->route('displayCampaigns');
    }

    public function openHandler($id){
        $campaign = Campaign::find($id);
        $products = $this->retrieveElements($id,'products');
        $posts = $this->retrieveElements($id,'posts');
        $coupons = $this->retrieveElements($id,'coupons');
        $availableProducts = Product::all();
        $availablePosts = BlogPost::all();
        $availableCoupons = Coupon::all();

        return view('campaignHandler', compact('availableCoupons','availablePosts','availableProducts','campaign','products', 'posts', 'coupons'));
    }

    public function changeStatus(Request $request, $id){
        $status = $request->input('status');
        DB::table('campaigns')->where('id', $id)->update(['approved' => $status]);
        header("Location: http://localhost:8000/campaignHandler/$id", true);
        die();
    }

    public function startCampaign($id){
        DB::table('campaigns')->where('id', $id)->update(['is_running' => true]);
        header("Location: http://localhost:8000/campaignHandler/$id", true);
        die();
    }

    public function stopCampaign($id){
        DB::table('campaigns')->where('id', $id)->update(['is_running' => false]);
        header("Location: http://localhost:8000/campaignHandler/$id", true);
        die();
    }
}
