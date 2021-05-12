<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Campaign;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
    public function displayBlogPostForm(){
        return view('createBlogPost');
    }

    public function createPost(Request $request){
        $title = $request->input('title');
        $post = $request->input('post');
        $time = $request->added_at;

        $arrayToInsert = array('title'=> $title, 'post' => $post, 'added_at' => $time);
        DB::table('blog_posts')->insert($arrayToInsert);

        return redirect()->route('displayCampaigns');
    }

    public function addPostToCampaign(Request $request, $id){
        $today = strtotime('today');
        if(!$this->isWeekend($today)) {
            $postId = $request->input('postId');
            $postIdList = Campaign::where('id', $id)->value('posts');
            $msg = "Ez a bejegyzés már hozzá lett adva a kampányhoz!";
            $this->checkTheExistence($postId, $postIdList, $msg, $id);
            if ($postIdList == null) {
                DB::table('campaigns')->where('id', $id)->update(['posts' => array($postId)]);
            } else {
                array_push($postIdList, $postId);
                DB::table('campaigns')->where('id', $id)->update(['posts' => $postIdList]);
            }

            header("Location: http://localhost:8000/campaignHandler/$id", true);
            die();
        } else {
            $msg = 'Nem publikálhatsz bejegyzést hétvégén!';
            header("Location: http://localhost:8000/campaignHandler/$id?msg=$msg");
            die();
        }
    }

    public function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }

    public function openPost($postId){
        $post = BlogPost::where('id', $postId)->get();
        return view('read.readBlogPost', compact('post'));
    }
}
