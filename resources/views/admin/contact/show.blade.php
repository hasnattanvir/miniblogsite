@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View message</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{route('contact.index')}}">message List</a>
                    </li>
                    <li class="breadcrumb-item active"> View message</li>

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
                            <h3 class="card-title">view message</h3>

                            <a href="{{route('contact.index')}}" class="btn btn-primary">Go Back message list</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @include('include.errors')
                        <table class="table">
                            <tbody>
                                 <tr>
                                    <th style="width: 200px">Name</th>
                                    <td>{{ $message->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Email</th>
                                    <td>{{ $message->email }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Subject</th>
                                    <td>{{ $message->subject }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Message</th>
                                    <td>{{ $message->message }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
