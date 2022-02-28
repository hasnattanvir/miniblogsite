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
              <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
              <li class="breadcrumb-item active">Tag List</li>
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
                  <h3 class="card-title">Tag List</h3>
                  <a href="{{route('tag.create')}}" class="btn btn-primary">Create Tag</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Post Count</th>
                      <th>Discription</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($tags->count()>0)
                    @foreach ($tags as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->slug}}</td>
                      <td>{{$item->id}}</td>
                      <td>{{$item->description}}</td>

                      <td>
                       <div class="d-flex">
                        <a href="{{route('tag.edit',[$item->id])}}" class="btn btn-primary ml-2"><i class="fas fa-edit"></i></a>

                        <form action="{{route('tag.destroy',[$item->id])}}" class="ml-3" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-md btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        {{-- <a href="{{route('tag.show',[$item->id])}}" class="btn btn-success ml-2"><i class="fas fa-eye"></i></a> --}}

                       </div>
                      </td>


                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="6">
                        <h5 class="text-center">No Tag Found</h5>
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