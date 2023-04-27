@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                          <th>SubCategory Name</th>
                          <th>sub subCategory English</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($subsubcategories as $subsubcategory)
                        <tr>
                            <td>{{ $subsubcategory->category->category_name_en }}</td>
                            <td>{{ $subsubcategory->subcategory->subcategory_name_en }}</td>
                            <td>{{ $subsubcategory->subsubcategory_name_en }}</td>
                            <td>
                                <a href="{{ route('subsubcategory.edit',$subsubcategory->id) }}" title="Edit Data" class="btn btn-info">
                                <i class="fa fa-pencil"></i></a>
                                <a href="{{ route('subsubcategory.delete',$subsubcategory->id) }}"  onclick="event.preventDefault(); confirmDelete(this)" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
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
            <h3 class="box-title">Add Sub SubCategory</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('subsubcategory.store') }}">
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
                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="subcate_id" id="select" class="form-control"  >
                        <option value="" selected disabled >Select Your SubCategory</option>
                    </select>
                    @error('subcate_id')
                    <span class="text-danger" >{{ $message }}</span>
                    @enderror
                 </div>
                </div>

                <div class="form-group">
                    <h5 for="subsubcategory_eng">subSubCategory Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="subsubcategory_eng" name="subsubcategory_eng" class="form-control">
                        @error('subsubcategory_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="subsubcategory_ar">subSubCategory Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="subsubcategory_ar" name="subsubcategory_ar" class="form-control">
                        @error('subsubcategory_ar')
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

  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name="cate_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/subcategory/sub/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subcate_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcate_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
  </script>

@endsection
