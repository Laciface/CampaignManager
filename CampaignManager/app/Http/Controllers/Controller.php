<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Campaign;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkTheExistence($needle, $haystack, $msg, $id){
        $haystack = is_null($haystack)?array():$haystack;
        if(in_array($needle, $haystack)){
            header("Location: http://localhost:8000/campaignHandler/$id?msg=$msg");
            die();
        }
    }

    public function retrieveElements($id, $column){
        $idList = Campaign::where('id', $id)->value($column);
        $elements = array();
        if($idList != null) {
            foreach ($idList as $elementId) {
                switch ($column) {
                    case "products":
                        $element = Product::where('id', $elementId)->get();
                        array_push($elements, $element);
                        break;
                    case "posts":
                        $element = BlogPost::where('id', $elementId)->get();
                        array_push($elements, $element);
                        break;
                    case "coupons":
                        $element = Coupon::where('id', $elementId)->get();
                        array_push($elements, $element);
                        break;
                }
            }
        }
        return $elements;
    }
    public function checkProductsOfRunningCampaigns($productIds){
        $productIds = is_null($productIds)?array():$productIds;
        $ids = array();
        foreach (Campaign::where('is_running', 1)->get() as $campaign) {
            $ids = array_merge($campaign->products, $ids);
        }
        foreach ($productIds as $id){
            if(in_array($id, $ids)){
                return false;
            }
        }
        return true;
    }
}
