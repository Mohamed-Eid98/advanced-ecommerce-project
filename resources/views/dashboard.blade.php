@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                @php
                    Use App\Models\User;
                    $user = User::find(Auth::user()->id);
                @endphp
                <img class="card-img-top" style="border-radius: 50%;height:100%;width:100%" src="{{ !empty($user->profile_photo_path) ?
                    url('uploads/frontend_images/'.$user->profile_photo_path) : url('uploads/no_image.jpg') }}" alt=""><br><br>
                <ul class="list-group list-group-flush" >
                    <a href="{{ url('/') }}" class="btn btn-primary btn-sm btn-block" >Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block" >Profile Update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block" >Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block" >Logout</a>
                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center"> <span>Hi .... </span><strong> {{ Auth::user()->name }}</strong>
                        Welcome To Easy Shop
                    </h3>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
