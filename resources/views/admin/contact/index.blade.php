@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Message Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
              <li class="breadcrumb-item active">Message List</li>
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
                  <h3 class="card-title">Message List</h3>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>User Name</th>
                      <th>User Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($messages->count()>0)
                    @foreach ($messages as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->subject}}</td>
                      <td>{{$item->message}}</td>

                      

                      <td>
                       <div class="d-flex">
                        <form action="{{route('contact.destroy',['id' => $item->id])}}" class="ml-3" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-md btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        <a href="{{route('contact.show',['id'=>$item->id])}}" class="btn btn-success ml-2"><i class="fas fa-eye"></i></a>

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