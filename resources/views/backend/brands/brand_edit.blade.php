@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">

      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Brand</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="id" value="{{ $brand->id }}">
            <input type="hidden" name="image" value="{{ $brand->brand_image }}">
                <div class="form-group">
                    <h5 for="brand_eng">Brand Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="brand_eng" name="brand_eng" value="{{ $brand->brand_name_en }}" class="form-control">
                        @error('brand_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="brand_ar">Brand Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="brand_ar" name="brand_ar" value="{{ $brand->brand_name_ar }}" class="form-control">
                        @error('brand_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="brand_img">Brand Image <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" id="brand_img" name="brand_img" class="form-control">
                        @error('brand_img')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
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
