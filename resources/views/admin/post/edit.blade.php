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
                <a href="{{route('post.index')}}">post List</a>
              </li>
              <li class="breadcrumb-item active"> Edit post</li>

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
                  <h3 class="card-title">Edit post {{$post->name}}</h3>
                  
                  <a href="{{route('post.index')}}" class="btn btn-primary">Go Back post list</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @include('include.errors')
                <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label >post Name</label>
                      <input type="text" value="{{$post->title}}" name="title" class="form-control">
                    </div>


                    <div class="mb-3">
                      <label class="form-label">Select Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="" selected>Select Category</option>
                          @foreach ($categories as $item)

                            <option value="{{$item->id}}"  >{{$item->name}}</option>

                          @endforeach
                        </select>
                    </div>

{{-- show tag all --}}
                    <div class="form-group">
                      @foreach ($tags as $item)
                        <div class="custom-control custom-checkbox">
                          {{-- data pass multipol tai array use korlam --}}
                          <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{$item->id}}" value="{{$item->id}}" 
                          @foreach ($post->tags as $t)
                              @if($item->id == $t->id)
                              Checked
                              @endif
                          @endforeach
                          >
                          <label for="tag{{$item->id}}" class="custom-control-label">{{$item->name}}</label>
                        </div>
                      @endforeach
                    </div>


                    <div class="mb-3">
                      <label for="">Image</label>
                      <input type="file"  name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label > Old Image</label>
                      <br>
                      <img style="width:300px" src="{{$post->image}}" class="img-fluid"  alt="photos">
                    </div>
                  

                    <div class="form-group">
                      <label>post Description</label>
                      <textarea name="discription" id="discription" cols="30" rows="4" class="form-control">
                        {{$post->discription}}
                      </textarea>
                    </div>
                   
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update post</button>
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