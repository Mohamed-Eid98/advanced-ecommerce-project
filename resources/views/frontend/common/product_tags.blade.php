@php
    $english_tags = App\Models\Product::where('status',1)->groupBy('product_tags_en')->select('product_tags_en')->get();
    $arabic_tags = App\Models\Product::where('status',1)->groupBy('product_tags_ar')->select('product_tags_ar')->get();


@endphp


<!-- ============================================== PRODUCT TAGS ============================================== -->
<div class="sidebar-widget product-tag wow fadeInUp">
<h3 class="section-title">Product tags</h3>
<div class="sidebar-widget-body outer-top-xs">
    <div class="tag-list">

        @if(session()->get('language') == 'arabic')
            @foreach ($arabic_tags as $tag)
                <a class="item" title="Phone" href="{{ url('product/tag/'. $tag->product_tags_ar) }}"> {{ $tag->product_tags_ar }} </a>
            @endforeach
        @else
            @foreach ($english_tags as $tag)

                <a class="item" title="Phone" href="{{ url('product/tag/'. $tag->product_tags_en ) }}">  {{ str_replace(',',' ',$tag->product_tags_en) }} </a>
            @endforeach
        @endif


</div>
    <!-- /.tag-list -->
</div>
<!-- /.sidebar-widget-body -->
</div>

<!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->
