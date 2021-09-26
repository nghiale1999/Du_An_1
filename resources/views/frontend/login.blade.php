@extends('frontend.layout.app')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                        @if (session('success'))
                            <div class="alert alert-success">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif
                     <form  method="POST">
                        @csrf
                        <input type="email" placeholder="email" name="email"/>
                        <input type="password" placeholder="password" name="password"/>
                        <span>
                            <input type="checkbox" class="checkbox" name="click"> 
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                    <ul class="alert text-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><!--/login form-->
            </div>
            
            
        </div>
    </div>
</section><!--/form-->
    
@endsection