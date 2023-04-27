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
                          <th>Category Icon</th>
                          <th>Category English</th>
                          <th>Category Arabic</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><span><i class="{{ $category->category_icon }}"></i></span></td>
                            <td>{{ $category->category_name_en }}</td>
                            <td>{{ $category->category_name_ar }}</td>
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}" title="Edit Data" class="btn btn-info">
                                <i class="fa fa-pencil"></i></a>
                                <a href="{{ route('category.delete',$category->id) }}"  onclick="event.preventDefault(); confirmDelete(this)"
                                    class="btn btn-danger" title="Delete Data">
                                    <i class="fa fa-trash"></i></a>
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

            <form method="post" action="{{ route('category.store') }}">
            @csrf
                <div class="form-group">
                    <h5 for="category_eng">Category Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="category_eng" name="category_eng" class="form-control">
                        @error('category_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="category_ar">Category Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="category_ar" name="category_ar" class="form-control">
                        @error('category_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="category_icon">Category Icon <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="category_icon" name="category_icon" class="form-control">
                        @error('category_icon')
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection
