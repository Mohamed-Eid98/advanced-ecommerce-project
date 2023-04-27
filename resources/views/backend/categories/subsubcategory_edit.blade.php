@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">

      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Sub->SubCategory</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('subsubcategory.update',$subsubcategory->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $subsubcategory->id }}">

            <div class="form-group">
                <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="cate_id" id="select" class="form-control" >
                        <option value="" selected disabled >Select Your Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($category->id == $subsubcategory->category_id) ? 'selected' : '' }}>{{ $category->category_name_en  }}</option>
                        @endforeach
                    </select>
                    @error('cate_id')
                    <span class="text-danger" >{{ $message }}</span>
                    @enderror
                 </div>
                </div>
            <div class="form-group">
                <h5>Sub Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="subcate_id" id="select" class="form-control"  >
                        <option value="" selected disabled >Select Your Sub Category</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ ($subcategory->id == $subsubcategory->subcategory_id ) ? 'selected' : '' }} >{{ $subcategory->subcategory_name_en  }}</option>
                        @endforeach
                    </select>
                    @error('subcate_id')
                    <span class="text-danger" >{{ $message }}</span>
                    @enderror
                 </div>
                </div>

                <div class="form-group">
                    <h5 for="subsubcategory_eng">SubSubCategory Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="subsubcategory_eng" name="subsubcategory_eng" value="{{ $subsubcategory->subsubcategory_name_en }}" class="form-control">
                        @error('subsubcategory_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="subsubcategory_ar">subSubCategory Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="subsubcategory_ar" name="subsubcategory_ar" value="{{ $subsubcategory->subsubcategory_name_ar }}" class="form-control">
                        @error('subsubcategory_ar')
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
