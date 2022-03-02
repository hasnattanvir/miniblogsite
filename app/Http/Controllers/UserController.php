<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function index(){
        $users = user::latest()->paginate(20);
        return view('admin.user.index',compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' =>'required|string|max:255',
            'email' =>'required|email|unique:users,email',
            'password'=>'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
        ]);

        Session::flash('success','User Created Successfully');
        return redirect()->back();

    }

    public function edit(User $user){
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, User $user){
       $this->validate($request,[
            'name' =>'required|string|max:255',
            'email' =>'required|email|unique:users,email, $user->id',
            'password'=>'sometimes|nullable|min:8',
        ]);

    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->save();
    

        Session::flash('success','User updated Successfully');
        return redirect()->back();
    }

    public function destroy(User $user){
       if($user){
           $user->delete();
           Session::flash('sucess','User Deleted Sucessfully');

       }
       return redirect()->back();
    }

    public function profile(){
        $user = auth()->user();
        return view('admin.user.profile', compact('user'));
    }

    public function profile_update(Request $request){
        $user= auth()->user();
        $this->validate($request,[
            'name' =>'required|string|max:255',
            'email' =>'required|email|unique:users,email, $user->id',
            'password'=>'sometimes|nullable|min:8',
            'image'=>'sometimes|nullable|image|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage/user/',$image_new_name);
            $user->image = '/storage/user/'.$image_new_name;
            $user->save();
        }
        $user->save();

        Session::flash('sucess','User update Sucessfully');
        return redirect()->back();
    }
}
