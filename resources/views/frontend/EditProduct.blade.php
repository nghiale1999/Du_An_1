
@extends('frontend.layout.app')
@section('content')

<div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
            @endif
            <form  class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Tên sản phẩm</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" name="tensp" value="{{$data[0]->tensp}}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Hình ảnh</label>
                    @php $hinh = json_decode($data[0]->hinh); @endphp
                    <div class="col-md-12">
                        <input type="file" name="img[]" multiple>
                        @foreach($hinh as $val_image)
                            <input type="checkbox" name="file[]" value="{{$val_image}}">
                            <label for="image_1"></label><img src="{{asset('/upload/user/product/'.$data[0]->id_user.'vua-'.$val_image)}}" width = 50px alt=""><br>                                                              
                        @endforeach

                    </div>
                </div>


                <div class="form-group">
                    <label for="example-email" class="col-md-12">Giá sản phẩm</label>
                    <div class="col-md-12">
                        <input type="text"  class="form-control form-control-line" id="example-email" name="giasp" value="{{$data[0]->giasp}}">
                    </div>
                    
                </div>


                <div class="form-group">
                    <label for="example-email" class="col-md-12">Loại sản phẩm</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" id="example-email" name="loaisp" value="{{$data[0]->loaisp}}" >
                    </div>
                    
                </div>


                <div class="form-group">
                    <label class="col-md-12">Thương hiệu</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" name="thuonghieu" value="{{$data[0]->thuonghieu}}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-12">giảm giá</label>
                    <div class="col-sm-12">
                        <select name="giamgia" id="giamgia" class="col-sm-3">
                            <option id="sale" value="1">sale</option>
                            <option value="0">new</option>
                        </select>
                    </div>
                </div>
                <p></p><input type="text" placeholder="100%" name="sale" id="phantram">

                <div class="form-group">
                    <label class="col-md-12">Mô tả</label>
                    <div class="col-md-12">
                        <textarea rows="5" class="form-control form-control-line" name="mota" value="{{$data[0]->mota}}"></textarea>
                    </div>
                </div>

                <ul class="alert text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">Update Product</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>



@endsection
@section('script')

<Script>

    $(document).ready(function(){

        $('#giamgia').click(function(){
            var sale = $(this).val();
            if(sale == "1"){
                $('#phantram').show();
            }else{
                $('#phantram').hide();
            }
        })

    })

</Script>

@endsection
