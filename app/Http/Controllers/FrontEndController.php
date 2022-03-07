<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Home;
use App\Models\User;
use App\Models\Contact;
use Session;





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



    public function tag($slug){
        // ai route ta catagory page er jonno 
        $tag = Tag::where('slug',$slug)->first();
        // return $tag->posts;
        // jodi tag find kore pai tahole view korbe
        if($tag){
            // categoy je post gula ace ta search kore send korlam front-end 
            $posts = $tag->posts()->orderBy('created_at','desc')->paginate(9);
            // return $posts;
            return view('website.tag',compact('tag','posts'));
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


    public function send_message(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|email|max:200',
            'subject'=>'required|max:255',
            'message' => 'required|min:100',


        ]);
            $contact = Contact::create($request->all());
        Session::flash('success','contact Update Successfully');
        return redirect()->back();
    }

    public function search(Request $request){
        // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $posts = Post::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('discription', 'LIKE', "%{$search}%")
        ->get();
    

    // Return the search view with the resluts compacted
    return view('website.searchresult', compact('posts'));
    }

}
