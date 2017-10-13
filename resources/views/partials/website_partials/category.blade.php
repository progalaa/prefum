<?php
if(Auth::user())
    foreach ($carts as $cart){
        $ids[] = $cart->product_id;
    }
else{
    $ids[]=array();
}
$ids[]=array();
?>

<section class="page-header page-header-xs">
    <div class="container">

        <!-- breadcrumbs -->
        <ol class="breadcrumb breadcrumb-inverse">
            <li><a href="{{route('home', [app()->getLocale()])}}">الرئيسية</a></li>
            <li class="active"></li>
        </ol><!-- /breadcrumbs -->

    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                    @include('partials/website_partials/filter')
            </div>
            <div class="col-md-9">

                <!-- etlala -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="heading-title heading-border  heading-color">
                                <h4> @if(app()->getLocale() == 'en')
                                        {{$cat_name->name_en}}
                                    @elseif(app()->getLocale() == 'ar')
                                        {{$cat_name->name_ar}}
                                    @endif<span>  ({{\App\Http\Controllers\HomeController::getproductCount($cat_name->id)}})</span></h4>
                            </div>
                            <!-- item -->
                            @foreach($cats as $cat)
                            <div class="shop-item col-md-5th ">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="{{route('product', [app()->getLocale(),$cat->id])}}">
                                        <img class="img-responsive" src="{{ url('/public/images/'.$cat->image) }}" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->


                                    <!-- hover -->
                                    <div class="shop-item-hover">
                                        <a class="btn" href="{{route('product', [app()->getLocale(),$cat->id])}}">إكتشف المزيد</a>
                                    </div>
                                    <!-- /hover -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <a href="{{route('product', [app()->getLocale(),$cat->id])}}"><h2>
                                            @if(app()->getLocale() == 'en')
                                                {{$cat->name_en}}
                                            @elseif(app()->getLocale() == 'ar')
                                                {{$cat->name_ar}}
                                            @endif
                                        </h2></a>
                                    <!-- price -->
                                    <div class="shop-item-price">
                                        {{$cat->price}} $
                                     </div>
                                    <!-- /price -->

                                    <!-- Adding to Cart -->

                                @if(Auth::user())
                                    <!--<div class="btn-group pull-left product-opt-qty">
    <input name="qty" type="number" id="qty" class="form-control qty"
           placeholder="الكمية"/>
</div>-->

                                        <input type="hidden" class="cart_url" value="{{ route('AddCart') }}">
                                        <input type="hidden" class="qty" value="1">
                                        <div>

                                            @if(in_array($cat->id,$ids))
                                                <button id="add_cart" class="btn btn-success btn-3d btn-reveal pull-left product-add-cart noradius"
                                                        data-user="{{ Auth::user()->id }}" data-product="{{$cat->id}}" disabled><i
                                                            class="fa fa-shopping-cart"></i>
                                                    <span>تمت الإضافة</span></button>
                                            @else
                                                <button id="add_cart" class="btn btn-primary btn-3d btn-reveal pull-left product-add-cart noradius"
                                                        data-user="{{ Auth::user()->id }}" data-product="{{$cat->id}}"><i
                                                            class="fa fa-shopping-cart"></i>
                                                    <span>اضف للعربة</span></button>
                                            @endif

                                        </div>
                                        <br>
                                    @endif
                                    *****************

                                    <!-- END Adding to Cart -->
                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-1 size-11"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->


                                </div>

                            </div><!-- /item -->
                                @endforeach
                        </div>


                    </div>
                </div>
                <!-- /etlala -->

            </div>
        </div>
    </div>
    <!-- FEATURED -->

</section>
