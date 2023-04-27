@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">

      <div class="col-8">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Slider List</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Slider Image</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td><img src="{{ asset($slider->slider_img) }}" alt="" style="width: 100px;height:70px">
                            </td>
                            <td>
                                @if ($slider->title == null)
                                    <span class="badge badge-pill badge-danger"> Null </span>
                                @else
                                    {{ $slider->title }}
                                @endif
                            </td>
                            <td>{{ $slider->description }}</td>
                            <td>
                                @if ($slider->status == 1)
                                    <span class="badge badge-pill badge-success"> Active </span>
                                @else
                                    <span class="badge badge-pill badge-danger"> InActive </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('slider.edit',$slider->id) }}" title="Edit Data" class="btn btn-info">
                                <i class="fa fa-pencil"></i></a>
                                <a href="{{ route('slider.delete',$slider->id) }}" onclick="event.preventDefault(); confirmDelete(this)"
                                    class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                @if($slider->status == 1)
                                    <a href="{{ route('slider.inactive',$slider->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                @else
                                    <a href="{{ route('slider.active',$slider->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                @endif
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
            <h3 class="box-title">Add Slider</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data" >
            @csrf
                <div class="form-group">
                    <h5 for="title"> Title <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="description">Description<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="description" name="description" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <h5 for="slider_img">Slider Image <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" id="slider_img" name="slider_img" class="form-control">
                        @error('slider_img')
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
