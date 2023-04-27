@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">

      <div class="col-8">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Brand List</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Brand English</th>
                          <th>Brand Arabic</th>
                          <th>Brand Image</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->brand_name_en }}</td>
                            <td>{{ $brand->brand_name_ar }}</td>
                            <td>
                                <img src="{{ asset($brand->brand_image) }}" alt="" style="width: 100px;height:70px">
                            </td>
                            <td>
                                <a href="{{ route('brand.edit',$brand->id) }}" title="Edit Data" class="btn btn-info">
                                <i class="fa fa-pencil"></i></a>
                                <a href="{{ route('brand.delete',$brand->id) }}" id="delete" onclick="event.preventDefault(); confirmDelete(this)"  class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i>da</a>
                            </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <div class="col-4">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Add Brand</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data" >
            @csrf
                <div class="form-group">
                    <h5 for="brand_eng">Brand Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="brand_eng" name="brand_eng" class="form-control">
                        @error('brand_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="brand_ar">Brand Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="brand_ar" name="brand_ar" class="form-control">
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

                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add">
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
