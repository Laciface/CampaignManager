<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Campaign;
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
        $postId = $request->input('postId');
        $postIdList = Campaign::where('id', $id)->value('posts');
        $msg = "ez a bejegyzés már hozzá lett adva a kampányhoz";
        $this->checkTheExistence($postId, $postIdList, $msg, $id);
        if($postIdList == null){
            DB::table('campaigns')->where('id', $id)->update(['posts'=> array($postId)]);
        } else {
            array_push($postIdList, $postId);
            DB::table('campaigns')->where('id', $id)->update(['posts'=> $postIdList]);
        }

        header("Location: http://localhost:8000/campaignHandler/$id", true);
        die();
    }

    public function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }
}
