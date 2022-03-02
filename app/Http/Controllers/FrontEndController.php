<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Home;


class FrontEndController extends Controller
{
    //

    public function home(){

        $posts = Post::with('Category','user')->orderBy('created_at','DESC')->take(5)->get();
        // post gula collction onujia jaitace tai divition kore nilam
        $firstpost = $posts->splice(0,2);
        $postsmid =  $posts->splice(0,1);
        // akta data thakbe tai jate kore loop use kore na lage tai 0 kore dibo
        // $postsmid = $postsmid[0];

        $lastpost =  $posts->splice(0);

        // return $postsmid;

        $recentPosts = Post::with('Category','user')->orderBy('created_at','DESC')->paginate(4);
        
        return view('website.home',compact(['posts','recentPosts','firstpost','postsmid','lastpost']));
    }

    public function about(){
        
        return view('website.about');
    }

    public function category(){
        
        return view('website.category');
    }

    public function contact(){
        
        return view('website.contact');
    }

    public function post($slug){
        $post = Post::with('Category','user')->where('slug',$slug)->first();
        // dd($post);
        if($post){
           
            return view('website.post',compact('post'));
        }

        return redirect('/');
    }
}
