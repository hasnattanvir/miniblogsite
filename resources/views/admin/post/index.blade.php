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
              <li class="breadcrumb-item"><a href="{{route('website.home')}}">Home</a></li>
              <li class="breadcrumb-item active">post List</li>
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
                  <h3 class="card-title">post List</h3>
                  <a href="{{route('post.create')}}" class="btn btn-primary">Create post</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th>Image</th>
                      {{-- <th>Discription</th> --}}
                      <th>Category Id</th>
                      <th>User Id</th>
                      <th>All Tag</th>
                      <th>Published Time</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($posts->count()>0)
                    @foreach ($posts as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->title}}</td>
                      <td>{{$item->slug}}</td>
                      <td>
                        <div style="width: 60px; max-height:60px; object-fit:cover;">
                          <img src="{{$item->image}}" class="img-fluid" alt="photo">
                        </div>
                        {{$item->image}}
                      </td>
                      {{-- <td>{!! $item->discription !!}}</td> --}}
                      <td>
                        {{$item->category->name}}
                         id = {{$item->category_id}}

                      </td>
                      <td>
                        {{$item->user->name}}

                        {{$item->user_id}}

                      </td>
                      {{-- tag show --}}
                      <td>
                        {{-- tag array show --}}
                        {{-- {{$item->tags}} --}}
                        @foreach ($item ->tags as $tag)
                            <span class="badge badge-primary">{{$tag->name}}</span>
                        @endforeach
                      </td>
                      <td>{{$item->published_at}}</td>

                      <td>
                       <div class="d-flex">
                        <a href="{{route('post.edit',[$item->id])}}" class="btn btn-primary ml-2"><i class="fas fa-edit"></i></a>

                        <form action="{{route('post.destroy',[$item->id])}}" class="ml-3" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-md btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        <a href="{{route('post.show',[$item->id])}}" class="btn btn-success ml-2"><i class="fas fa-eye"></i></a>

                       </div>
                      </td>


                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="9">
                        <h5 class="text-center">No post Found</h5>
                      </td>
                    </tr>


                    @endif
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection