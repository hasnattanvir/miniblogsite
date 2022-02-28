<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;

use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::orderBy('created_at','DESC')->paginate(20);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'title'=>'required|unique:posts,title',
            'image'=>'required|image',
            'discription'=>'required',
            'category'=>'required'
        ]);

        $post = post::create([
            'title' => $request->title,
            'image'=>'image.jpg',
            'category_id'=>$request->category,
            'slug' => Str::slug($request->title),
            'discription'=>$request->discription,
            'user_id' => auth()->user()->id,
            'published_at' =>Carbon::now(),

        ]);

        if($request->has('image')){

            $image = $request->image;
            $image_new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage/post/',$image_new_name);
            $post->image='/storage/post/'.$image_new_name;
            $post->save();
        }

        Session::flash('success','post created Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
         return view('admin.post.edit',compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //  $this->validate($request,[
        //     // 'title'=>"required|unique:posts,title,$post->id",
        //     // 'image'=>'required|image',
        //     'discription'=>'required',
        //     'category'=>'required'
        // ]);

      
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            // $post->image='image.jpg';
            $post->category_id=$request->category;
            $post->discription=$request->discription;
            // $post->user_id = auth()->user()->id;
            // $post->published_at =Carbon::now();


        if($request->hasFile('image')){

            $image = $request->image;
            $image_new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage/post/',$image_new_name);
            $post->image='/storage/post/'.$image_new_name;
            $post->save();
        }

        Session::flash('success','post update Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         if($post){
            $post->delete();
            Session::flash('success','post delete Successfully');
        return redirect()->route('post.index');
        }
    }
}
