@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">

      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Slider</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="id" value="{{ $slider->id }}">
            <input type="hidden" name="old_image" value="{{ $slider->slider_img }}">
                <div class="form-group">
                    <h5 for="title">Title <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="title" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="description">Description <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="description" name="description" value="{{ $slider->description }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="slider_img">slider Image <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" id="slider_img" name="slider_img" class="form-control">
                        @error('slider_img')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror

                        <img src="{{ asset($slider->slider_img) }}" alt="" style="width: 870px;height:370px">
                    </div>
                </div>

                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
            </form>

              </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>



      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

@endsection
