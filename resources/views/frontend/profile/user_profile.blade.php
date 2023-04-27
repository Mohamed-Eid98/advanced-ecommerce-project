@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
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
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="name">Name </label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control unicase-form-control text-input" id="name" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">Email Adress </label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control unicase-form-control text-input" id="email" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="phone">Phone Number </label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control unicase-form-control text-input" id="phone" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="photo">Your Picture </label>
                            <input type="file" name="photo" value="" class="form-control unicase-form-control text-input" id="photo" >
                        </div>
                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button> <br><br>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
