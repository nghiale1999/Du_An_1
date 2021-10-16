
@extends('frontend.layout.giaodiencart')
@section('content')

<section id="cart_items">
	<div class="container">
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
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>




					@if (session()->has('cart'))
						@foreach ($data as $value)
							<tr id="{{$value['id']}}">

								@php $hinh = json_decode($value['hinh']); @endphp

								@if(is_array($hinh) && !empty($hinh))
									<td class="cart_product">
										<a href=""><img src="{{asset('upload/user/product/'.$value['id_user'].'vua-'.$hinh[0])}}" width="100px" alt=""></a>
									</td>
								@endif

								<td class="cart_description">
									<h4><a href="">{{$value['tensp']}}</a></h4>
									<p>Web ID: {{$value['id']}}</p>
								</td>
								<td class="cart_price">
									<p>${{$value['giasp']}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" > + </a>

										@foreach ($SS as $ss)
											@if ($value['id'] == $ss['id_product'])
												<input class="cart_quantity_input" type="text" name="quantity" value="{{$ss['soluong']}}" autocomplete="off" size="2">
												
												@php
													$tong = $ss['soluong'] * $value['giasp'];
												@endphp
												
											@endif
										@endforeach																																																			
										<a class="cart_quantity_down" > - </a>
									</div>
								</td>
								
								<td class="cart_total">
									<p class="cart_total_price">${{$tong}}</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" id="{{$value['id']}}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
						@endforeach
					@endif
					
					
					




					<tr>
						<td class="cart_product">
							<a href=""><img src="images/cart/two.png" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">Colorblock Scuba</a></h4>
							<p>Web ID: 1089772</p>
						</td>
						<td class="cart_price">
							<p>$59</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">$59</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
						</td>
					</tr>


					<tr>
						<td class="cart_product">
							<a href=""><img src="images/cart/three.png" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">Colorblock Scuba</a></h4>
							<p>Web ID: 1089772</p>
						</td>
						<td class="cart_price">
							<p>$59</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">$59</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->


@endsection

@section('script')

<script>

		$(document).ready(function(){


			$('a.cart_quantity_delete').click(function(){
				var id = $(this).attr('id');
				
                $.ajax({
                        method: "POST",
                        url: '/Du_An/public/frontend/deletecart',
                        data:{
                                _token: '{{csrf_token()}}',
                                id_product: id,                               
                             },
                        success:function(data){
                           alert(data);

                        }    

                    }); 

				$(this).closest('td.cart_delete').closest('tr').remove();

			});



			$('a.cart_quantity_down').click(function(){				
				var id = $(this).closest('tr').attr('id');								
				$.ajax({
                        method: "POST",
                        url: '/Du_An/public/frontend/downcart',
                        data:{
                                _token: '{{csrf_token()}}',
                                id_product: id,                               
                             },
                        success:function(data){
							alert(data);														
                        }    
                    });

				var sl = $(this).closest('tr#'+id).find('.cart_quantity_input').attr('value');
				if(sl>=1){
					$(this).closest('tr#'+id).find('.cart_quantity_input').val(parseInt(sl)-parseInt(1));
					var soluong = parseInt(sl)-parseInt(1);
					var b = $(this).closest('tr#'+id).find('.cart_price').find('p').text();
					var gia = b.replace('$','');
					var tong = parseInt(soluong) * parseInt(gia);
					$(this).closest('tr#'+id).find('.cart_total_price').text('$ '+tong);
				}								
			});



			$('a.cart_quantity_up').click(function(){				
				var id = $(this).closest('tr').attr('id');
				console.log(id);								
				$.ajax({
                        method: "POST",
                        url: '/Du_An/public/frontend/upcart',
                        data:{
                                _token: '{{csrf_token()}}',
                                id_product: id,                               
                             },
                        success:function(data){
							alert(data);														
                        }    
                    });

				var sl = $(this).closest('tr').find('.cart_quantity_input').attr('value');
				
				$(this).closest('tr').find('.cart_quantity_input').val(parseInt(sl) + parseInt(1));
				var soluong = parseInt(sl) + parseInt(1);
				var b = $(this).closest('tr').find('.cart_price').find('p').text();
				var gia = b.replace('$','');
				var tong = parseInt(soluong) * parseInt(gia);
				$(this).closest('tr').find('.cart_total_price').text('$ '+tong);
					
											
			})
           

		})

</script>

@endsection