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
                        <th scope="col">tiêu đề</th>
                        <th scope="col">hình</th>
                        <th scope="col">nội dung</th>
                        <th scope="col">xóa</th>
                        <th scope="col">sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value) 
                    <tr class="table-active">
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->tieude}}</td>
                        <td>{{$value->hinh}}</td>
                        <td>{{$value->des}}</td>
                        <td><a  class="btn btn-primary" href="{{url('admin/blog/delete/'.$value->id)}}">delete</a></td>
                        <td><a  class="btn btn-primary" href="{{url('admin/blog/edit/'.$value->id)}}">Edit</a></td>
                    </tr>
                    @endforeach 
                </tbody>
                <button><a  class="btn btn-info" href="{{url('admin/blog/add')}}">Add Blog</a></button>
            </table>
             {{ $data->links() }}
        </div>
    </div>
</div>

@endsection