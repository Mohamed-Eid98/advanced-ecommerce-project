@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">

      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Category</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('category.update',$category->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
                <div class="form-group">
                    <h5 for="category_eng">Category Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="category_eng" name="category_eng" value="{{ $category->category_name_en }}" class="form-control">
                        @error('category_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="category_ar">Category Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="category_ar" name="category_ar" value="{{ $category->category_name_ar }}" class="form-control">
                        @error('category_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="category_ar">Category Icon <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="category_icon" name="category_icon" value="{{ $category->category_icon }}" class="form-control">
                        @error('category_icon')
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
