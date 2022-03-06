@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">
                        <a href="{{route('setting.edit')}}">setting List</a>
                    </li> --}}
                    <li class="breadcrumb-item active"> Edit setting</li>

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
                            <h3 class="card-title">Edit site setting</h3>

                            <a href="{{route('settings.index')}}" class="btn btn-primary">Go Back setting</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @include('include.errors')
                        <form action="{{route('settings.update',[$setting->id])}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>setting Name</label>
                                            <input type="text" value="{{$setting->name}}" name="name"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label>Site Logo</label>
                                            <input type="file" name="site_logo"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label> Old Image</label>
                                            <br>
                                            <img style="width:300px" src="{{$setting->site_logo}}" class="img-fluid"
                                                alt="photos">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>About Site</label>
                                            <textarea name="about_site" cols="30" rows="4" class="form-control">
                                              {{$setting->about_site}}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>facebook</label>
                                            <input type="text" value="{{$setting->facebook}}" name="facebook"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>twitter</label>
                                            <input type="text" value="{{$setting->twitter}}" name="twitter"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>instagram</label>
                                            <input type="text" value="{{$setting->instagram}}" name="instagram"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>reddit</label>
                                            <input type="text" value="{{$setting->reddit}}" name="reddit"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" value="{{$setting->email}}" name="email"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Contact Phone</label>
                                            <input type="text" value="{{$setting->phone}}" name="phone"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Contact Location</label>
                                            <input type="text" value="{{$setting->address}}" name="address"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Copyright</label>
                                            <input type="text" value="{{$setting->copyright}}" name="copyright"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update setting</button>
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
