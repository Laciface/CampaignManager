<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function displayCouponForm(){
        return view('createCoupon');
    }

    public function createCoupon(Request $request){
        $name = $request->input('name');
        $discount = $request->input('discount');
        $percentage = $discount * 100;

        $arrayToInsert = array('name'=> $name, 'discount' => $discount, 'percentage' => $percentage);
        DB::table('coupons')->insert($arrayToInsert);

        return redirect()->route('displayCampaigns');
    }

    public function addCouponToCampaign(Request $request, $id){
        $couponId = $request->input('couponId');
        $couponIdList = Campaign::where('id', $id)->value('coupons');
        $msg = "ez a kupon már hozzá lett adva a kampányhoz";
        $this->checkTheExistence($couponId, $couponIdList, $msg, $id);
        if($couponIdList == null){
            DB::table('campaigns')->where('id', $id)->update(['coupons'=> array($couponId)]);
        } else {
            array_push($couponIdList, $couponId);
            DB::table('campaigns')->where('id', $id)->update(['coupons'=> $couponIdList]);
        }

        header("Location: http://localhost:8000/campaignHandler/$id", true);
        die();
    }

    public function activateCoupon(Request $request, $id){
        $discount = $request->input('coupon');
        $multiplier = (float) 1 - $discount;
        $productList = Campaign::where('id', $id)->value('products');
        $this->setSalePrice($productList, $multiplier, $id);
    }

    public function setSalePrice($productIds, $multiplier, $campaignId){
            foreach($productIds as $id){
                $price = Product::where('id', $id)->value('price');
                $sale = $multiplier * $price;
                Product::where('id', $id)->update(['sale' => $sale]);
            }
        header("Location: http://localhost:8000/campaignHandler/$campaignId", true);
        die();
    }
}
