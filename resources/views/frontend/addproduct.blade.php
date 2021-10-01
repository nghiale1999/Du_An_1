
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
                        <input type="text" class="form-control form-control-line" name="tensp">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Hình ảnh</label>
                    <div class="col-md-12">
                        <input type="file"  class="form-control form-control-line"  name="img[]" multiple>
                    </div>
                </div>


                <div class="form-group">
                    <label for="example-email" class="col-md-12">Giá sản phẩm</label>
                    <div class="col-md-12">
                        <input type="text"  class="form-control form-control-line" id="example-email" name="giasp" >
                    </div>
                    
                </div>


                <div class="form-group">
                    <label for="example-email" class="col-md-12">Loại sản phẩm</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" id="example-email" name="loaisp"  >
                    </div>
                    
                </div>


                <div class="form-group">
                    <label class="col-md-12">Thương hiệu</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" name="thuonghieu">
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
                        <textarea rows="5" class="form-control form-control-line" name="mota"></textarea>
                    </div>
                </div>

                <ul class="alert text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">Add Product</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>






{{-- @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
<form action="" method="POST" enctype="multipart/form-data">
    
    @csrf
        <p><b>Tên sản phẩm : </b></p><input type="text" name="tensp" >
        <p><b>Giá sản phẩm : </b></p><input type="text" name="giasp" >
        <p><b>Loại sản phẩm: </b></p><input type="text" name="loaisp" >
        <p><b>Thương hiệu: </b></p><input type="text" name="thuonghieu" >
        <p><b>Hình ảnh: </b></p><input type="file" name="img[]" multiple>
        <p><b>giảm giá:</b></p>
        <select name="giamgia" id="giamgia" class="col-sm-9">
            <option id="sale" value="1">sale</option>
            <option value="0">new</option>
        </select>
        <p></p><input type="text" name="sale" id="phantram">
        <p><b>Mô tả:</b></p><textarea class="col-sm-9" name="mota"></textarea>
        <p><input type="submit" value="Add Product"></p>
    
    </form>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach --}}
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
