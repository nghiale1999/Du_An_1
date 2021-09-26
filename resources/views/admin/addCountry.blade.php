@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class="col-8">
        @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        <form action="" method="POST">
            @csrf
            Name Country: <input type="text" name="name">
            <input type="submit" value="Add Country">
        </form>
    </div>
</div>

@endsection