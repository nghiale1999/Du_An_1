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
            <form  class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" name="name" value="{{Auth::user()->name}}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Avatar</label>
                    <div class="col-md-12">
                        <input type="file"  class="form-control form-control-line" name="avatar">
                    </div>
                </div>


                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email"  class="form-control form-control-line" id="example-email" name="email" value="{{Auth::user()->email}}" readonly>
                    </div>
                    
                </div>


                <div class="form-group">
                    <label for="example-email" class="col-md-12">Address</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" id="example-email" name="address" value="{{Auth::user()->address}}" >
                    </div>
                    
                </div>


                <div class="form-group">
                    <label class="col-md-12">Password</label>
                    <div class="col-md-12">
                        <input type="password" class="form-control form-control-line" name="password"  value="{{Auth::user()->password}}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Phone No</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" name="phone" value="{{Auth::user()->phone}}">
                    </div>
                </div>


            


                <div class="form-group">
                    <label class="col-sm-12">Select Country</label>
                    <div class="col-sm-12">
                        <select class="col-sm-3" name="country" id="">
                            @foreach ($datacountry as $value)
                                <option value={{$value->id}} <?php echo Auth::user()->id_country == $value['id'] ? 'selected':''; ?>>{{$value->name}}</option>
                                                                
                            @endforeach
                    
                        </select>
                    </div>
                </div>


                <ul class="alert text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>




     
@endsection