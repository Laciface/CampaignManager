<?php

namespace App\Http\Controllers;

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
}
