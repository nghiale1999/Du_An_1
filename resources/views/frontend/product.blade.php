
@extends('frontend.layout.app')
@section('content')
<section id="cart_items">
    <div class="container col-sm-9">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">image</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá sản phẩm</td>
                        <td class="quantity">delete</td>
                        <td class="quantity">edit</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

              
                    @foreach ($data as $value)
                        
                        <tr>
                            @php $hinh = json_decode($value->hinh); @endphp

							@if(is_array($hinh) && !empty($hinh))
                                <td class="cart_product">
                                    <a href=""><img src="{{asset('upload/user/product/'.$value->id_user.'vua-'.$hinh[0])}}" alt=""></a>
                                </td>
							@endif
                            
                            <td class="cart_description">
                                <h4><a href="">{{$value->tensp}}</a></h4>
                                <p>{{$value->thuonghieu}}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{$value->giasp}}</p>
                            </td>
                            
                            <td >
                                <a  class="btn btn-primary" href="{{url('frontend/prodouct/delete/'.$value->id)}}">delete</a>
                                
                            </td>
                            <td >
                                <a  class="btn btn-primary" href="{{url('frontend/prodouct/edit/'.$value->id)}}">Edit</a>
                            </td>
                        </tr>
                            
                    @endforeach
                    
                    
                    

                    
                </tbody>
            </table>
           
        </div>
        <button><a href="{{url('frontend/addproduct')}}">Add Product</a></button>
    </div>
</section> <!--/#cart_items-->
@endsection

