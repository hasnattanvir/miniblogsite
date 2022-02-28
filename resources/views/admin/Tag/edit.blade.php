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
                <a href="{{route('tag.index')}}">Tag List</a>
              </li>
              <li class="breadcrumb-item active"> Edit Tag</li>

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
                  <h3 class="card-title">Edit Tag {{$tag->name}}</h3>
                  
                  <a href="{{route('tag.index')}}" class="btn btn-primary">Go Back Tag list</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @include('include.errors')
                <form action="{{route('tag.update',[$tag->id])}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label >Tag Name</label>
                      <input type="text" value="{{$tag->name}}" name="name" class="form-control">
                    </div>
                  

                    <div class="form-group">
                      <label>Tag Description</label>
                      <textarea name="description" id="description" cols="30" rows="4" class="form-control">
                        {{$tag->description}}
                      </textarea>
                    </div>
                   
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Tag</button>
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