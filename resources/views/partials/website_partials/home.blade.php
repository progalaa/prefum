<section class="featured-grid">
    <div class="container">

        <div class="row">

            <div class="col-sm-6">
                <img src="{{ url('/public/images/head/grid1.jpg') }}" alt=""/>
                <div class="ribbon hidden-xs">
                    <div class="absolute">
                        <h2>87%</h2>
                        <h4>OFF</h4>
                    </div>
                </div>
                <div class="absolute bottom-right text-right">
                    <h1 class="text-white">
                        <em>تخفيضات</em>
                        <em class="weight-300 text-white">ضخمة</em>
                    </h1>
                    <a class="btn btn-primary btn-xs margin-top-10" href="#">إكتشف الان &raquo;</a>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="relative">
                    <img src="{{ url('/public/images/head/man_cat.jpg') }}" alt=""/>

                    <div class="absolute text-left">
                        <h2>عروض للرجال</h2>
                        <p>
                            لا تفوتها
                        </p>


                        <a class="btn btn-primary margin-top-20" href="{{route('category', [app()->getLocale(),1])}}">تسوق الان &raquo;</a>
                    </div>
                </div>

                <div class="relative">
                    <img src="{{ url('/public/images/head/woman_cat.jpg') }}" alt=""/>

                    <div class="absolute text-right">
                        <h2>عروض للسيدات فقط</h2>
                        <p>
                            لا تفوتى عرضك اليوم !
                        </p>


                        <a class="btn btn-primary margin-top-20" href="{{route('category', [app()->getLocale(),2])}}">تسوقى الان &raquo;</a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- /FEATURED GRID -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('partials/website_partials/filter')
            </div>
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-title heading-dotted text-center">
                            <h3 class="owl-featured">
                                @if(app()->getLocale() == 'en')
                                    Skin Care
                                @elseif(app()->getLocale() == 'ar')
                                    منتجات العناية بالبشرة
                                @endif

                            </h3>
                        </div>

                        <div class="owl-carousel featured nomargin owl-padding-10"
                             data-plugin-options='{"singleItem": false, "items": "5", "stopOnHover":false, "autoPlay":4000, "autoHeight": false, "navigation": true, "pagination": false}'>
                        @foreach($skinCareItems as $skin)
                            <!-- item -->
                                <div class="shop-item">

                                    <div class="thumbnail">
                                        <!-- product image(s) -->
                                        <a class="shop-item-image" href="{{route('product', [app()->getLocale(),$skin->id])}}">
                                            <img class="img-responsive" src="{{ url('/public/images/'.$skin->image) }}"
                                                 alt="shop first image">
                                        </a>
                                        <!-- /product image(s) -->


                                        <!-- hover -->
                                        <div class="shop-item-hover">
                                            <a class="btn" href="{{route('product', [app()->getLocale(),$skin->id])}}">إكتشف المزيد</a>
                                        </div>
                                        <!-- /hover -->
                                    </div>

                                    <div class="shop-item-summary text-center">
                                        <a href="{{route('product', [app()->getLocale(),$skin->id])}}">
                                            <h2>
                                                @if(app()->getLocale() == 'en')
                                                    {{$skin->name_en}}
                                                @elseif(app()->getLocale() == 'ar')
                                                    {{$skin->name_ar}}
                                                @endif
                                            </h2>
                                        </a>
                                        <!-- price -->
                                        <div class="shop-item-price">
                                            {{$skin->price}} $
                                        </div>
                                        <!-- /price -->
                                        <!-- rating -->
                                        <div class="shop-item-rating-line">
                                            <div class="rating rating-1 size-11"><!-- rating-0 ... rating-5 --></div>
                                        </div>
                                        <!-- /rating -->


                                    </div>

                                </div>
                                <!-- /item -->
                            @endforeach
                        </div>

                    </div>
                </div>
                <!-- /FEATURED -->
                <!-- new -->
                <div class="row">
                    <div class="col-md-12">


                        <div class="heading-title heading-dotted text-center">
                            <h3 class="owl-featured">
                                @if(app()->getLocale() == 'en')
                                    Latest Added
                                @elseif(app()->getLocale() == 'ar')
                                    وصلت حديثا
                                @endif
                            </h3>
                        </div>

                        <div class="owl-carousel featured nomargin owl-padding-10"
                             data-plugin-options='{"singleItem": false, "items": "5", "stopOnHover":false, "autoPlay":4000, "autoHeight": false, "navigation": true, "pagination": false}'>
                        @foreach($latest as $lat)
                            <!-- item -->
                                <div class="shop-item">

                                    <div class="thumbnail">
                                        <!-- product image(s) -->
                                        <a class="shop-item-image" href="{{route('product', [app()->getLocale(),$lat->id])}}">
                                            <img class="img-responsive" src="{{ url('/public/images/'.$lat->image) }}"
                                                 alt="shop first image">
                                        </a>
                                        <!-- /product image(s) -->


                                        <!-- hover -->
                                        <div class="shop-item-hover">
                                            <a class="btn" href="{{route('product', [app()->getLocale(),$lat->id])}}">إكتشف المزيد</a>
                                        </div>
                                        <!-- /hover -->
                                    </div>

                                    <div class="shop-item-summary text-center">
                                        <a href="{{route('product', [app()->getLocale(),$lat->id])}}"><h2>
                                                @if(app()->getLocale() == 'en')
                                                    {{$lat->name_en}}
                                                @elseif(app()->getLocale() == 'ar')
                                                    {{$lat->name_ar}}
                                                @endif
                                            </h2></a>
                                        <!-- price -->
                                        <div class="shop-item-price">
                                            {{$lat->price}} $
                                        </div>
                                        <!-- /price -->
                                        <!-- rating -->
                                        <div class="shop-item-rating-line">
                                            <div class="rating rating-1 size-11"><!-- rating-0 ... rating-5 --></div>
                                        </div>
                                        <!-- /rating -->


                                    </div>

                                </div>
                            @endforeach

                        </div>


                    </div>
                </div>

                <!-- /new -->
                <!-- best seller -->
                <div class="row">
                    <div class="col-md-12">


                        <div class="heading-title heading-dotted text-center">
                            <h3 class="owl-featured">
                                @if(app()->getLocale() == 'en')
                                    Most Sold
                                @elseif(app()->getLocale() == 'ar')
                                    الأكثر مبيعا
                                @endif
                            ً</h3>
                        </div>

                        <div class="owl-carousel featured nomargin owl-padding-10"
                             data-plugin-options='{"singleItem": false, "items": "5", "stopOnHover":false, "autoPlay":4000, "autoHeight": false, "navigation": true, "pagination": false}'>

                            @foreach($ordered as $ord)
                            <!-- item -->
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="{{route('product', [app()->getLocale(),$ord->id])}}">
                                        <img class="img-responsive" src="{{ url('/public/images/'.$ord->image) }}"
                                             alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->


                                    <!-- hover -->
                                    <div class="shop-item-hover">
                                        <a class="btn" href="{{route('product', [app()->getLocale(),$ord->id])}}">إكتشف المزيد</a>
                                    </div>
                                    <!-- /hover -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <a href="{{route('product', [app()->getLocale(),$ord->id])}}">
                                        <h2>
                                            @if(app()->getLocale() == 'en')
                                                {{$ord->name_en}}
                                            @elseif(app()->getLocale() == 'ar')
                                                {{$ord->name_ar}}
                                            @endif
                                        </h2>
                                    </a>
                                    <!-- price -->
                                    <div class="shop-item-price">
                                       {{$ord->price}}  $
                                    </div>
                                    <!-- /price -->
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

                <!-- /best seller -->
                <!-- gifts -->
                <div class="row">
                    <div class="col-md-12">


                        <div class="heading-title heading-dotted text-center">
                            <h3 class="owl-featured">
                                @if(app()->getLocale() == 'en')
                                    Offers
                                @elseif(app()->getLocale() == 'ar')
                                    العروض
                                @endif
                            </h3>
                        </div>

                        <div class="owl-carousel featured nomargin owl-padding-10"
                             data-plugin-options='{"singleItem": false, "items": "5", "stopOnHover":false, "autoPlay":4000, "autoHeight": false, "navigation": true, "pagination": false}'>
                            @foreach($offers as $offer)
                            <!-- item -->
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="{{route('product', [app()->getLocale(),$offer->id])}}">
                                        <img class="img-responsive" src="{{ url('/public/images/'.$offer->image) }}"
                                             alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->


                                    <!-- hover -->
                                    <div class="shop-item-hover">
                                        <a class="btn" href="{{route('product', [app()->getLocale(),$offer->id])}}">إكتشف المزيد</a>
                                    </div>
                                    <!-- /hover -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <a href="{{route('product', [app()->getLocale(),$offer->id])}}"><h2>
                                            @if(app()->getLocale() == 'en')
                                                {{$offer->name_en}}
                                            @elseif(app()->getLocale() == 'ar')
                                                {{$offer->name_ar}}
                                            @endif
                                        </h2></a>
                                    <!-- price -->
                                    <div class="shop-item-price">
                                        {{$offer->price}}  $
                                    </div>
                                    <!-- /price -->
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

                <!-- /gifts -->
                <!-- etlala -->

                <div class="row">
                    <div class="col-md-12">


                        <div class="heading-title heading-dotted text-center">
                            <h3 class="owl-featured">
                                @if(app()->getLocale() == 'en')
                                    Collection
                                @elseif(app()->getLocale() == 'ar')
                                    متنوع
                                @endif
                            </h3>
                        </div>

                        <div class="row">
                            @foreach($products as $product)
                            <!-- item -->
                            <div class="shop-item col-md-5th ">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="{{route('product', [app()->getLocale(),$product->id])}}">
                                        <img class="img-responsive" src="{{ url('/public/images/'.$product->image) }}"
                                             alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->


                                    <!-- hover -->
                                    <div class="shop-item-hover">
                                        <a class="btn" href="{{route('product', [app()->getLocale(),$product->id])}}">إكتشف المزيد</a>
                                    </div>
                                    <!-- /hover -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <a href="{{route('product', [app()->getLocale(),$product->id])}}">
                                        <h2>
                                            @if(app()->getLocale() == 'en')
                                                {{$product->name_en}}
                                            @elseif(app()->getLocale() == 'ar')
                                                {{$product->name_ar}}
                                            @endif
                                        </h2>
                                    </a>
                                    <!-- price -->
                                    <div class="shop-item-price">
                                        {{$product->price}} $
                                    </div>
                                    <!-- /price -->
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
