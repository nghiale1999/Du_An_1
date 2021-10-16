@extends('frontend.layout.app')
@section('content')
<div class="col-sm-9">
    <div class="blog-post-area">
        <h2 class="title text-center">Latest From our Blog</h2>
        <div class="single-blog-post">
            <h3>{{$data[0]->tieude}}</h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> Mac Doe</li>
                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>


                <span>
                    @for ($i = 1; $i <= 5; ++$i)
                        @if($i <= $tbs)
                            <i class="fa fa-star"></i>
                        @else
                            <i class="fa fa-star-o"></i>
                        @endif
				    @endfor
                </span>

                 
            </div>
            <a href="">
                <img src="{{asset('upload/'.$data[0]->hinh)}}" alt="">
            </a>
            <p>{{$data[0]->des}}</p>
            <div class="pager-area">
                <ul class="pager pull-right">
                    @if (!empty($datapre))
                        <li><a href="{{URL::to('frontend/blogsingle/'.$datapre)}}">Pre</a></li>
                    @endif
                    @if (!empty($datanext))
                        <li><a href="{{URL::to('frontend/blogsingle/'.$datanext)}}">next</a></li>
                    @endif
                    
                    {{-- href="{{url('frontend/blogsingle/'.$value->id)}}" --}}
                    
                    
                </ul>
            </div>
        </div>
    </div><!--/blog-post-area-->

    

    <div class="rating-area">
        <ul class="ratings">
            <li class="rate-this">Rate this item:</li>

            <div class="rate">
                <div class="vote">
                    <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                    <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                    <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                    <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                    <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                    <span class="rate-np">4.5</span>
                </div> 
            </div>
            <li class="color">(5 votes)</li>
        </ul>


        <ul class="tag">
            <li>TAG:</li>
            <li><a class="color" href="">Pink <span>/</span></a></li>
            <li><a class="color" href="">T-Shirt <span>/</span></a></li>
            <li><a class="color" href="">Girls</a></li>
        </ul>
    </div><!--/rating-area-->

    <div class="socials-share">
        <a href=""><img src="{{asset('frontend/images/blog/socials.png')}}" alt=""></a>
    </div><!--/socials-share-->

    
    <div class="response-area">     
        <ul class="media-list">

            @foreach ($comment as $value)
                @if ($data[0]->id == $value->id_blog)

                    @if ($value->id_cmt == 0)

                        <li class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{asset('upload/'.$value->avatar)}}" alt="" width="200px" height="150px">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>{{$value->name}}</li>
                                    <li><i class="fa fa-clock-o"></i>{{$value->created_at}}</li>
                                    <li><i class="fa fa-calendar"></i>{{$value->updated_at}}</li>
                                </ul>
                                <p>{{$value->cmt}}</p>
                                <a class="btn btn-primary replay" href="#form" id="{{$value->id}}"><i class="fa fa-reply"></i>Replay</a>
                            </div>
                        </li>
                    @endif
                    @foreach ($comment as $valuecon)
                        @if ($value->id == $valuecon->id_cmt)
                            <li class="media second-media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{asset('upload/'.$valuecon->avatar)}}" alt="" width="200px" height="150px">
                                </a>
                                <div class="media-body">
                                    <ul class="sinlge-post-meta">
                                        <li><i class="fa fa-user"></i>{{$valuecon->name}}</li>
                                        <li><i class="fa fa-clock-o"></i>{{$valuecon->created_at}}</li>
                                        <li><i class="fa fa-calendar"></i>{{$valuecon->updated_at}}</li>
                                    </ul>
                                    <p>{{$valuecon->cmt}}</p>
                                    
                                </div>
                            </li>
                        @endif
                        
                    @endforeach
                @endif
            @endforeach
            






            
            
        </ul>					
    </div><!--/Response-area-->


    
    <div class="replay-box">
        <div class="row">
            
            <div class="col-sm-8">
                <div class="text-area">
                    <div class="blank-arrow">
                        <label>Your Name</label>
                    </div>
                    <span>*</span>
                    <form action='' id="form" method="POST">
                     @csrf
                    <textarea name="message" rows="11"></textarea>
                    <input type="hidden" class="cmt_con" name="id_cmt">
                    <button type="submit" class="btn btn-primary postcmt">post comment</button> 
                </form>
                </div>
            </div>
        </div>
       
    </div><!--/Repaly Box-->





</div>
@endsection
@section('script')

<script>

		$(document).ready(function(){

			$('button.postcmt').click(function(){
                
                if({{Auth::check()}}){
                    
                    return true;
                    
                }else{
                    alert('vui long dang nhap truoc khi comment');
                }
				

			})

            $('a.replay').click(function () {
                if({{Auth::check()}}){
                    var id_cmt = $(this).attr('id');
                
                    $('input.cmt_con').val(id_cmt);
                    return true;
                }else{
                    alert('vui long dang nhap truoc khi comment');
                }
            })
			

            

            $('.ratings_stars').hover(

	            function() {

	                $(this).prevAll().andSelf().addClass('ratings_hover');

	            },

	            function() {

	                $(this).prevAll().andSelf().removeClass('ratings_hover');

	            }

	        );



			$('.ratings_stars').click(function(){


                if({{Auth::check()}}){
                   
                    if ($(this).hasClass('ratings_over')) {
                            $('.ratings_stars').removeClass('ratings_over');
                            $(this).prevAll().andSelf().addClass('ratings_over');
                        } else {
                            $(this).prevAll().andSelf().addClass('ratings_over');
                        }
                    
                    var sosao =  $(this).find("input").val();
                    var id_blog = "{{ $data[0]->id }}";
                    
                    $.ajax({
                        method: "POST",
                        url: '/Du_An/public/frontend/blog/ajax',
                        data:{
                                _token: '{{csrf_token()}}',
                                rate: sosao,
                                blog: id_blog,
                                
                             },
                        success:function(response){
                            alert(response);

                        }    

                    });

                }
                
                else{
                    alert('vui long dang nhap truoc khi danh gia');
                }

				

		    });





		})

</script>

@endsection