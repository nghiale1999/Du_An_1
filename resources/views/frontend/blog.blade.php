@extends('frontend.layout.app')
@section('content')


    <div class="col-sm-9">
        <div class="blog-post-area">
            <h2 class="title text-center">Latest From our Blog</h2>

            @foreach ($data as $value)
                
            <div class="single-blog-post">
                <h3>{{$value->tieude}}</h3>
                <div class="post-meta">
                    <ul>
                        <li><i class="fa fa-user"></i> Mac Doe</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                    </span>
                </div>
                <a href="">
                    <img src="{{asset('upload/'.$value->hinh)}}" alt="" width="500px" height="500px">
                </a>
                <p>{{$value->des}}</p>
                <a  class="btn btn-primary" href="{{url('frontend/blogsingle/'.$value->id)}}">Read More</a>
            </div>
            @endforeach
            {{ $data->links() }}
        </div>
    </div>
            
         
     
@endsection