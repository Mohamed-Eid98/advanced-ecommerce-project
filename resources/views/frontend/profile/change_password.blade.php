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
                    <h3 class="text-center"> change Password </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.password.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="password">Current Password </label>
                            <input type="password" name="old_password" class="form-control unicase-form-control text-input" id="password" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="new_password">New Password </label>
                            <input type="password" name="new_password"  class="form-control unicase-form-control text-input" id="new_password" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="new_password_confirmation">Password Confirmation</label>
                            <input type="password" name="new_password_confirmation" class="form-control unicase-form-control text-input" id="new_password_confirmation" >
                        </div>
                          <button type="submit" class="btn-upper btn btn-danger checkout-page-button">Update</button> <br><br>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
