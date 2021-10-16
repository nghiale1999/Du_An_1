@extends('admin.layout.app')
@section('content')
<div class="row">
    
    <div class="col-3"></div>
    <div class="col-9">
    <div class="card">
        
        <div class="table-responsive">
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value) 
                    <tr class="table-active">
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td><a  class="btn btn-primary" href="{{url('admin/country/delete/'.$value->id)}}">delete</a></td>
                    </tr>
                    @endforeach 
                    
                </tbody>
                <button><a  class="btn btn-info" href="{{url('admin/country/add')}}">Add Country</a></button>
            </table>
        </div>
    </div>
</div>
</div>
@endsection