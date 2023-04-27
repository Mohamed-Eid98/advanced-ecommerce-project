@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Add Product </h4>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('product.update', $product->id) }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="row">
<div class="col-12">


<div class="row"> <!-- start 1st row  -->
    <div class="col-md-4">

    <div class="form-group">
    <h5>Brand Select <span class="text-danger">*</span></h5>
    <div class="controls">
    <select name="brand_id" class="form-control" required=""  >
        <option value="" selected="" disabled="">Select Brand</option>
        @foreach($brands as $brand)
    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                @endforeach
            </select>
            @error('brand_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
            </div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
	<h5>Category Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="cate_id" class="form-control" required=""  >
			<option value="" selected="" disabled="">Select Category</option>
			@foreach($categories as $category)
 <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
			@endforeach
		</select>
		@error('cate_id')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>

			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				 <div class="form-group">
	<h5>SubCategory Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcate_id" class="form-control" required=""  >
			<option value="" selected="" disabled="">Select SubCategory</option>
			@foreach($subcategories as $subcategory)
 <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
			@endforeach
		</select>
		@error('subcate_id')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>

			</div> <!-- end col md 4 -->

		</div> <!-- end 1st row  -->

<div class="row"> <!-- start 2nd row  -->
    <div class="col-md-4">

        <div class="form-group">
            <h5>Sub SubCategory Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="subsubcate_id" class="form-control" required=""  >
                    <option value="" selected="" disabled="">Select SubCategory</option>
                    @foreach($subsubcategories as $subsubcategory)
                    <option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id == $product->subsubcategory_id ? 'selected' : '' }}>{{ $subsubcategory->subsubcategory_name_en }}</option>
                               @endforeach
                </select>
                @error('subsubcate_id')
             <span class="text-danger">{{ $message }}</span>
             @enderror
             </div>
                 </div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

                <div class="form-group">
                    <h5 for="product_eng">Product Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="product_eng" name="product_eng" value="{{ $product->product_name_en }}" class="form-control" required="">
                        @error('product_eng')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 4 -->


			<div class="col-md-4">

                <div class="form-group">
                    <h5 for="product_ar">Product Name Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="product_ar" value="{{ $product->product_name_ar }}" name="product_ar" class="form-control" required="">
                        @error('product_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 4 -->

		</div> <!-- end 2nd row  -->

<div class="row"> <!-- start 3rd row  -->
    <div class="col-md-4">

        <div class="form-group">
            <h5 for="product_code">Product Code<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" id="product_code" name="product_code" value="{{ $product->product_code }}" class="form-control" required="">
                @error('product_code')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

                <div class="form-group">
                    <h5 for="product_quantity">Product Quantity<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="product_quantity" name="product_quantity" value="{{ $product->product_qty }}" class="form-control" required="">
                        @error('product_quantity')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 4 -->


			<div class="col-md-4">

                <div class="form-group">
                    <h5 for="product_tags_en">Product Tags En <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text"  name="product_tags_en" value="{{ $product->product_tags_en }}" data-role="tagsinput" placeholder="add tags" />
                        @error('product_tags_en')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 4 -->

		</div> <!-- end 3rd row  -->

<div class="row"> <!-- start 4th row  -->
    <div class="col-md-4">

        <div class="form-group">
            <h5 for="product_tags_ar">Product Tags Ar <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text"  name="product_tags_ar" value="{{ $product->product_tags_ar }}" data-role="tagsinput" placeholder="add tags" />
                @error('product_tags_ar')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

                <div class="form-group">
                    <h5 for="product_size_en">Product Size En <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text"  name="product_size_en" value="{{ $product->product_size_en }}" data-role="tagsinput" placeholder="add tags" />
                        @error('product_size_en')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 4 -->


			<div class="col-md-4">

                <div class="form-group">
                    <h5 for="product_size_ar">Product Size Ar <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text"  name="product_size_ar" value="{{ $product->product_size_ar }}" data-role="tagsinput" placeholder="add tags" />
                        @error('product_size_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 4 -->

		</div> <!-- end 4th row  -->

<div class="row"> <!-- start 5th row  -->
    <div class="col-md-6">

        <div class="form-group">
            <h5 for="product_colors_en">Product Colors En <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text"  name="product_colors_en" value="{{ $product->product_color_en }}" data-role="tagsinput" placeholder="add tags" />
                @error('product_colors_en')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 6 -->

			<div class="col-md-6">

                <div class="form-group">
                    <h5 for="product_colors_ar">Product Colors Ar <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text"  name="product_colors_ar" value="{{ $product->product_color_ar }}" data-role="tagsinput" placeholder="add tags" />
                        @error('product_colors_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 6 -->


		</div> <!-- end 5th row  -->

<div class="row"> <!-- start 6th row  -->
	<div class="col-md-6">

        <div class="form-group">
         <h5>Product Selling Price <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="product_selling_price" class="form-control" required="" value="{{ $product->selling_price }}">
                @error('product_selling_price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 6 -->

			<div class="col-md-6">

                <div class="form-group">
                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_discount_price" class="form-control"  required="" value="{{ $product->discount_price }}">
                        @error('product_discount_price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 6 -->

		</div> <!-- end 6th row  -->

<div class="row"> <!-- start 7th row  -->
    <div class="col-md-6">

        <div class="form-group">
            <h5 for="short_desc_en">Short Description English <span class="text-danger">*</span></h5>
            <div class="controls">
				<textarea name="short_desc_en" id="textarea" class="form-control" required >{{ $product->short_descp_en }}</textarea>
                @error('short_desc_en')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 6 -->

			<div class="col-md-6">

                <div class="form-group">
                    <h5 for="short_desc_ar">Short Description Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="short_desc_ar" id="textarea" class="form-control"  required >{{ $product->short_descp_ar }}</textarea>
                        @error('short_desc_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 6 -->


		</div> <!-- end 7th row  -->

<div class="row"> <!-- start 8th row  -->
    <div class="col-md-6">

        <div class="form-group">
            <h5 for="long_desc_en">Long Description English <span class="text-danger">*</span></h5>
            <div class="controls">
                    <textarea id="editor1" name="long_desc_en"  required rows="10" cols="80">
                        {!! $product->long_descp_en !!}
                    </textarea>
                @error('long_desc_en')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 6 -->

			<div class="col-md-6">

                <div class="form-group">
                    <h5 for="long_desc_ar">Long Description Arabic <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea id="editor2" name="long_desc_ar" required rows="10" cols="80">
                            {!! $product->long_descp_ar !!}
                        </textarea>
                        @error('long_desc_ar')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 6 -->


		</div> <!-- end 7th row  -->

<hr>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<div class="controls">
					<fieldset>
						<input type="checkbox" id="checkbox_1" name="hot_deals" value="1" {{ $product->hot_deals == '1' ? 'checked' : '' }} >
						<label for="checkbox_1">Hot Deals</label>
					</fieldset>
					<fieldset>
						<input type="checkbox" id="checkbox_2" name="featured"  value="2" {{ $product->featured == '2' ? 'checked' : '' }}  >
						<label for="checkbox_2">Featured</label>
					</fieldset>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<div class="controls">
					<fieldset>
						<input type="checkbox" id="checkbox_3" name="special_offer" value="1" {{ $product->special_offer == '1' ? 'checked' : '' }} >
						<label for="checkbox_3">Special Offer</label>
					</fieldset>
					<fieldset>
						<input type="checkbox" id="checkbox_4" name="special_deals" value="2" {{ $product->special_deals == '2' ? 'checked' : '' }}>
						<label for="checkbox_4">Special Deals</label>
					</fieldset>
				</div>
			</div>
		</div>
						</div>

						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->

	<!-- ///////////////// Start Multiple Image Update Area ///////// -->
    <section class="content">
        <div class="row">

   <div class="col-md-12">
                   <div class="box bt-3 border-info">
                     <div class="box-header">
            <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                     </div>


           <form method="post" action="{{ route('product.update-images') }}" enctype="multipart/form-data">
            @csrf
               <div class="row row-sm">
                   @foreach($multiImgs as $img)
                   <div class="col-md-3">

   <div class="card">
     <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
     <div class="card-body">
       <h5 class="card-title">
   <a href="{{ route('product.image.delete' , $img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
        </h5>
       <p class="card-text">
           <div class="form-group">
               <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
               <input class="form-control" type="file" name="multi_img[ {{ $img->id }} ]">
           </div>
       </p>

     </div>
   </div>

                   </div><!--  end col md 3		 -->
                   @endforeach

               </div>

               <div class="text-xs-right">
   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
            </div>
   <br><br>



           </form>


                   </div>
                 </div>



        </div> <!-- // end row  -->

    </section>

    	<!-- ///////////////// End Multiple Image Update Area ///////// -->



    <!-- ///////////////// Start Thambnail Image Update Area ///////// -->

 <section class="content">
    <div class="row">

<div class="col-md-12">
               <div class="box bt-3 border-info">
                 <div class="box-header">
        <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                 </div>


       <form method="post" action="{{ route('product.update.thambnail') }}" enctype="multipart/form-data">
       @csrf

    <input type="hidden" name="id" value="{{ $product->id }}">
   <input type="hidden" name="old_img" value="{{ $product->product_thambnail }}">

           <div class="row row-sm">

               <div class="col-md-3">

<div class="card">
 <img src="{{ asset($product->product_thambnail) }}" class="card-img-top" style="height: 130px; width: 280px;">
 <div class="card-body">

   <p class="card-text">
       <div class="form-group">
           <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
   <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)"  >
    <img src="" id="mainThmb">
       </div>
   </p>

 </div>
</div>

               </div><!--  end col md 3		 -->


           </div>

           <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
        </div>
<br><br>



       </form>


     </div>



               </div>
             </div>



    </div> <!-- // end row  -->

</section>
<!-- ///////////////// End Start Thambnail Image Update Area ///////// -->



	  </div>

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
                    $('select[name="subsubcate_id"]').html('');
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


    $('select[name="subcate_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "{{  url('/subcategory/sub/sub/ajax') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    var d =$('select[name="subsubcate_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="subsubcate_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });



});
</script>

<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@endsection
