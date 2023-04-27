@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Admin Edit Profile</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data" >
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" value="{{ $editData->name }}" required data-validation-required-message="This field is required"> </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" value="{{ $editData->email }}" required data-validation-required-message="This field is required"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="image" name="profile_photo" class="form-control"> </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img class="rounded-circle" style="width: 100px;height:100px"  src="{{ !empty($editData->profile_photo_path) ?
                                    url('uploads/images/'.$editData->profile_photo_path) : url('uploads/no_image.jpg') }}" id="showImage"
                                    alt="Admin Avatar">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Edit">
                </form>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->

    </section>
    <!-- /.content -->
</div>

<script>

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection

