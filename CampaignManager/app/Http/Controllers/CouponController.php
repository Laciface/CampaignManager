<?php

namespace App\Http\Controllers;

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
    }
}
