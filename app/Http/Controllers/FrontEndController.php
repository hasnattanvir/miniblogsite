<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Home;
use App\Models\User;



class FrontEndController extends Controller
{
    //

    public function home(){

        // ------------ header popular post -----------
        $posts = Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();
        // post gula collction onujia jaitace tai divition kore nilam
        $firstpost = $posts->splice(0,2);
        $postsmid =  $posts->splice(0,1);
        // akta data thakbe tai jate kore loop use kore na lage tai 0 kore dibo
        // $postsmid = $postsmid[0];
        $lastpost =  $posts->splice(0);

        // return $postsmid;

        // ------------ footer  post -----------
        //inrandom use korbo 
        $footerposts = Post::with('category','user')->inRandomOrder()->limit(4)->get();
        // post gula collction onujia jaitace tai divition kore nilam
        $footerpostfirst = $footerposts->splice(0,1);
        $footerpostsmid =  $footerposts->splice(0,2);
        $footerpostlast =  $footerposts->splice(0,1);
        // return $footerpostlast;

       

        $recentPosts = Post::with('category','user')->orderBy('created_at','DESC')->paginate(4);
        // dd($recentPosts);
        return view('website.home',compact(['posts','recentPosts','firstpost','postsmid','lastpost','footerpostfirst','footerpostsmid','footerpostlast']));
    }

    public function about(){
        $user = User::first();
        return view('website.about',compact('user'));
    }

    public function category($slug){
        // ai route ta catagory page er jonno 
        $category = category::where('slug',$slug)->first();
        // jodi category find kore pai tahole view korbe
        if($category){
            // categoy je post gula ace ta search kore send korlam front-end 
            $posts = Post::where('category_id',$category->id)->paginate(9);
            return view('website.category',compact(['category','posts']));
        }else{
            return redirect()->route('website');
        }
    }

    public function contact(){
        return view('website.contact');
    }

// data post or single page send korlam

    public function post($slug){
        $post = Post::with('Category','user')->where('slug',$slug)->first();
        // aita popular post use korbo random kore single poste send korlam
        $posts = Post::with('Category','user')->inRandomOrder()->limit(3)->get();

        // more related post gula 
        $relatedpost = Post::orderBy('category_id','desc')->inRandomOrder()->take(4)->get();
        // post gula collction onujia jaitace tai divition kore nilam
        $relatedpostfirst = $relatedpost->splice(0,1);
        $relatedpostmid =  $relatedpost->splice(0,2);
        $relatedpostlast =  $relatedpost->splice(0,1);






        // categories er jonno use korbo j poste bobohar
        $categories = Category::all();
        $tags= Tag::all();

        // dd($post);
        if($post){
            return view('website.post',compact(['post','posts','categories','tags','relatedpostfirst','relatedpostmid','relatedpostlast']));
        }

        return redirect('/');
    }
}
