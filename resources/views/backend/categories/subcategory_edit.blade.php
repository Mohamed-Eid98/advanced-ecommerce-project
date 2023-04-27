@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">

      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit SubCategory</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('subcategory.update',$subcategory->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $subcategory->id }}">

            <div class="form-group">
                <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="cate_id" id="select" class="form-control"  >
                        <option value="" selected disabled >Select Your Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($category->id == $subcategory->category_id) ? 'selected' : '' }}>{{ $category->category_name_en  }}</option>
                        @endforeach
                    </select>
                    @error('cate_id')
                    <span class="text-danger" >{{ $message }}</span>
                    @enderror
                 </div>
                </div>

                <div class="form-group">
                    <h5 for="subcategory_eng">SubCategory Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="subcategory_eng" name="subcategory_eng" value="{{ $subcategory->subcategory_name_en }}" class="form-control">
                        @error('subcategory_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="subcategory_ar">SubCategory Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="subcategory_ar" name="subcategory_ar" value="{{ $subcategory->subcategory_name_ar }}" class="form-control">
                        @error('subcategory_ar')
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
