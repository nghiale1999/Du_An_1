@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
    <div class="card">
        
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">level</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Warning</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $value) 
                    <tr class="table-active">
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        @if ($value->lavel == 0)
                            <td>member</td>
                        @else
                            <td>admin</td>
                        @endif

                        
                        <td>{{$value->phone}}</td>
                        <td>{{$value->address}}</td>
                        
                        <td><a  class="btn btn-primary" href="{{url('admin/qluser/delete/'.$value->id)}}">Delete</a></td>
                        <td><a  class="btn btn-danger" href="{{url('admin/qluser/warning/'.$value->id)}}">Warning</a></td>
                    </tr>
                    @endforeach 
                </tbody>
                
            </table>
             
        </div>
    </div>
</div>

@endsection