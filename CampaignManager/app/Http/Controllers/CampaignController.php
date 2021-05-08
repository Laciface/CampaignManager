<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function createCampaign(Request $request){
        $name = $request->input('name');
        $first_day = $request->input('first_day');
        $last_day = $request->input('last_day');
        $status = $request->input('status') == 'accepted';

        $arrayToInsert = array('name'=>$name, 'first_day' =>$first_day, 'last_day' => $last_day, 'approved' => $status);
        DB::table('campaigns')->insert($arrayToInsert);

    }


}
