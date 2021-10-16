@extends('frontend.layout.giaodienlogin')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            
            
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    @if (session('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                    @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <b>user name: </b><input type="text" placeholder="Name" name="name"/>
                        <b>avatar   : </b><input type="file" name="file">
                        <b>email    : </b><input type="email" placeholder="Email Address" name="email"/>
                        <b>password :</b><input type="password" placeholder="Password" name="password"/>
                        <button type="submit" class="btn btn-default">dang ky</button>
                    </form>
                    <button><a href="{{url('frontend/login')}}"><i class="fa fa-lock"></i>Đăng nhập</a></button>
                    <ul class="alert text-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

    
@endsection