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

                            </div>
                            <!-- item -->
                            @foreach($Menus as $men)
                            <div class="shop-item col-md-5th ">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="{{route('product', [app()->getLocale(),$men->id])}}">
                                        <img class="img-responsive" src="{{ url('/public/images/'.$men->image) }}" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->


                                    <!-- hover -->
                                    <div class="shop-item-hover">
                                        <a class="btn" href="{{route('product', [app()->getLocale(),$men->id])}}">إكتشف المزيد</a>
                                    </div>
                                    <!-- /hover -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <a href="{{route('product', [app()->getLocale(),$men->id])}}"><h2>
                                            @if(app()->getLocale() == 'en')
                                                {{$men->name_en}}
                                            @elseif(app()->getLocale() == 'ar')
                                                {{$men->name_ar}}
                                            @endif
                                        </h2></a>
                                    <!-- price -->
                                    <div class="shop-item-price">
                                        {{$men->price}} $
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
