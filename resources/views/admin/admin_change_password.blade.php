@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Admin Change password</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="post" action="{{ route('admin.password.store') }}">
                    @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h5 for="old_password">Old Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" id="old_password" name="old_password" class="form-control" required data-validation-required-message="This field is required"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h5 for="new_password">New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="new_password" id="new_password" class="form-control" required data-validation-required-message="This field is required"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h5>Confirm Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="new_password_confirmation" class="form-control" required data-validation-required-message="This field is required"> </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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

@endsection

