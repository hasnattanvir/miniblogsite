@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Starter Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{route('user.index')}}">user List</a>
                    </li>
                    <li class="breadcrumb-item active"> User Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header  ">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Catagory List</h3>

                            <a href="{{route('user.index')}}" class="btn btn-primary">Go Back user list</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        @include('include.errors')
                        <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('put') --}}
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-5 pr-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">User Name</label>
                                            <input type="text" value="{{$user->name}}" name="name" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" value="{{$user->email}}" name="email" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputPassword1">User Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4 pl-2">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">User Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">post Description</label>
                                            <textarea name="description" id="description" cols="30" rows="4"
                                                class="form-control">
                                              {{$user->description}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-3">
                                      <div class="card" style="width: 18rem;">
                                        <img src="{{$user->image}}" class="card-img-top" alt="photo">
                                        <div class="card-body">
                                          <h4 class="card-title">Name:{{$user->name}}</h5>
                                          <br>
                                          <h5 class="card-title">Email:{{$user->email}}</h5>
                                          <p class="card-text">Discription : {{$user->description}}</p>
                                        </div>
                                      </div>
                                    </div>





                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
