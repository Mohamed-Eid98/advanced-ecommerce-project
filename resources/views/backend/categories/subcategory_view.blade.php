@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">

      <div class="col-8">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Category List</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Category Name</th>
                          <th>Category English</th>
                          <th>Category Arabic</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->category->category_name_en }}</td>
                            <td>{{ $subcategory->subcategory_name_en }}</td>
                            <td>{{ $subcategory->subcategory_name_ar }}</td>
                            <td>
                                <a href="{{ route('subcategory.edit',$subcategory->id) }}" title="Edit Data" class="btn btn-info">
                                <i class="fa fa-pencil"></i></a>
                                <a href="{{ route('subcategory.delete',$subcategory->id) }}"  onclick="event.preventDefault(); confirmDelete(this)"  class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
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
            <h3 class="box-title">Add Category</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('subcategory.store') }}">
            @csrf

            <div class="form-group">
                <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="cate_id" id="select" class="form-control"  >
                        <option value="" selected disabled >Select Your Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name_en  }}</option>
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
                        <input type="text" id="subcategory_eng" name="subcategory_eng" class="form-control">
                        @error('subcategory_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="subcategory_ar">SubCategory Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="subcategory_ar" name="subcategory_ar" class="form-control">
                        @error('subcategory_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add New">
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
