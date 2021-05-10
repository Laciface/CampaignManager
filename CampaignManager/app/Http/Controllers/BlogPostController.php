<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
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
}
