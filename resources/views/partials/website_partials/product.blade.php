<section class="page-header page-header-xs">
    <div class="container">

        <!-- breadcrumbs -->
        <ol class="breadcrumb breadcrumb-inverse">
            <li><a href="{{route('home', [app()->getLocale()])}}">الرئيسية</a></li>
            <li class="active"></li>
        </ol><!-- /breadcrumbs -->

    </div>
</section>


<!-- -->
<section>
    <div class="container">

        <div class="row">

            <!-- IMAGE -->
            <div class="col-lg-4 col-sm-4">

                <div class="thumbnail relative margin-bottom-3">

                    <!--
                        IMAGE ZOOM

                        data-mode="mouseover|grab|click|toggle"
                    -->
                    <figure id="zoom-primary" class="zoom" data-mode="mouseover">
                        <!--
                            zoom buttton

                            positions available:
                                .bottom-right
                                .bottom-left
                                .top-right
                                .top-left
                        -->
                        data-plugin-options='{"type":"image"}'><i class="glyphicon glyphicon-search"></i></a>

                        <!--
                            image

                            Extra: add .image-bw class to force black and white!
                        -->
                        <img class="img-responsive single-img" src="{{ url('/public/images/'.$product->image) }}"
                             width="1200" height="1500" alt="This is the product title"/>
                    </figure>

                </div>

                <!-- Thumbnails (required height:100px) -->
                <div data-for="zoom-primary" class="zoom-more owl-carousel owl-padding-3 featured"
                     data-plugin-options='{"singleItem": false, "autoPlay": false, "navigation": true, "pagination": false}'>
                    @foreach($product->images as $img)
                        <a class="thumbnail active" href="{{ url('/public/images/'.$img->image) }}">
                            <img src="{{ url('/public/images/'.$img->image) }}" height="100" alt=""/>
                        </a>
                    @endforeach

                </div>
                <!-- /Thumbnails -->

            </div>
            <!-- /IMAGE -->

            <!-- ITEM DESC -->
            <div class="col-lg-8 col-sm-8">

                <!-- buttons -->
                <div class="pull-right">

                    <input type="hidden" id="list_url" value="{{ route('AddWishlist') }}">

                    <!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                    @if(Auth::user())
                        <button class="btn btn-default add_wishlist" id="add_wishlist"
                                data-user="{{ Auth::user()->id }}" data-product="{{$product->id}}" data-toggle="tooltip"
                                title="اضف للمفضلة"><i class="fa fa-heart nopadding"></i></button>
                    @endif


                </div>
                <!-- /buttons -->
                <h1 class="single-product-title margin-bottom-20">
                    @if(app()->getLocale() == 'en')
                        {{$product->name_en}}
                    @elseif(app()->getLocale() == 'ar')
                        {{$product->name_ar}}
                    @endif
                </h1>
                <!-- price -->
                <div class="shop-item-price">
                    <span class="line-through nopadding-left"> $ {{$product->price * 1.136}}</span>
                    {{$product->price}} $
                </div>
                <!-- /price -->

                <hr/>


                <!-- short description -->
                <p>
                    @if(app()->getLocale() == 'en')
                        {{$product->title_en}}
                    @elseif(app()->getLocale() == 'ar')
                        {{$product->title_ar}}
                    @endif
                </p>
                <!-- /short description -->

                <hr/>

                @if(Auth::user())
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
                    <div class="btn-group pull-left product-opt-qty">
                        <input type="number" id="qty" class="form-control qty" placeholder="ادخل الكمية الطلوبة"/>
                    </div><!-- /btn-group -->

                    <input type="hidden" class="cart_url" value="{{ route('AddCart') }}">
                    @if(in_array($product->id,$ids))
                    <button id="add_cart" class="btn btn-success btn-3d btn-reveal pull-left product-add-cart noradius"
                            data-user="{{ Auth::user()->id }}" data-product="{{$product->id}}" disabled><i
                                class="fa fa-shopping-cart"></i>
                        <span>تمت الإضافة</span></button>
                    @else
                            <button id="add_cart" class="btn btn-primary btn-3d btn-reveal pull-left product-add-cart noradius"
                                    data-user="{{ Auth::user()->id }}" data-product="{{$product->id}}"><i
                                        class="fa fa-shopping-cart"></i>
                                <span>اضف الى عربة التسوق</span></button>
                    @endif
                @else
                    @if(app()->getLocale() == 'en')
                        <h3>Please <a href="{{route('login', ['locale' => app()->getLocale()])}}">Login</a> To Buy</h3>
                    @elseif(app()->getLocale() == 'ar')
                        <h3>قم  <a href="{{route('login', ['locale' => app()->getLocale()])}}">بتسجيل الدخول</a> لتتمكن من الشراء</h3>
                @endif
            @endif

            <!-- /FORM -->


                <hr/>

                <!-- Share -->
                <div class="pull-right">

                    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook pull-left"
                       data-toggle="tooltip" data-placement="top" title="Facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter pull-left"
                       data-toggle="tooltip" data-placement="top" title="Twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>

                    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-gplus pull-left"
                       data-toggle="tooltip" data-placement="top" title="Google plus">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>

                    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-linkedin pull-left"
                       data-toggle="tooltip" data-placement="top" title="Linkedin">
                        <i class="icon-linkedin"></i>
                        <i class="icon-linkedin"></i>
                    </a>

                </div>
                <!-- /Share -->


                <!-- rating -->
                <div>
                    <?php
                    $rate = $rateVal;
                    $non = 5 - $rate;
                    for ($i = 0; $i < $non; $i++) {
                        echo "<i class='fa fa-star-o'></i>";
                    }
                    for ($i = 0; $i < $rate; $i++) {
                        echo "<i class='fa fa-star'></i>";
                    }
                    ?>

                </div>
                <!-- /rating -->

            </div>
            <!-- /ITEM DESC -->

        </div>


        <ul id="myTab" class="nav nav-tabs nav-top-border margin-top-80" role="tablist">
            <li role="presentation" class="active"><a href="#description" role="tab" data-toggle="tab">
                    @if(app()->getLocale() == 'en')
                        Product Description
                    @elseif(app()->getLocale() == 'ar')
                        وصف المنتج
                    @endif
                </a></li>
            <li role="presentation"><a href="#reviews" role="tab" data-toggle="tab">
                    @if(app()->getLocale() == 'en')
                        rates
                    @elseif(app()->getLocale() == 'ar')
                        التقييمات
                    @endif
                    (2)</a></li>
        </ul>


        <div class="tab-content padding-top-20">

            <!-- DESCRIPTION -->
            <div role="tabpanel" class="tab-pane fade in active" id="description">
                <p>
                    @if(app()->getLocale() == 'en')
                        {{$product->description_en}}
                    @elseif(app()->getLocale() == 'ar')
                        {{$product->description_ar}}
                    @endif


                </p>
            </div>


            <!-- REVIEWS -->
            <div role="tabpanel" class="tab-pane fade" id="reviews">
            @foreach($reviews as $review)
                <!-- REVIEW ITEM -->
                    <div class="block margin-bottom-60">

								<span class="user-avatar"><!-- user-avatar -->
									<img class="pull-left media-object" src="{{ url('/public/images/avatar2.jpg') }}"
                                         width="64"
                                         height="64" alt="">
								</span>

                        <div class="media-body">
                            <h4 class="media-heading size-14">
                                {{$review->user_email}} &ndash;
                                <span class="text-muted">{{$review->created_at}}</span> &ndash;
                                <span class="size-14 text-muted">
                                    <?php
                                    $rate = $review->value;
                                    $non = 5 - $rate;
                                    for ($i = 0; $i < $non; $i++) {
                                        echo "<i class='fa fa-star-o'></i>";
                                    }
                                    for ($i = 0; $i < $rate; $i++) {
                                        echo "<i class='fa fa-star'></i>";
                                    }
                                    ?>
                                </span>
                            </h4>
                            <p>{{$review->comment}}</p>

                        </div>

                    </div>
                    <!-- /REVIEW ITEM -->
            @endforeach


            <!-- REVIEW FORM -->

                @if(Auth::user())
                    <h4 class="page-header margin-bottom-40">أضف تقييمك</h4>
                    <form id="form" method="post" action="{{route('review')}}">

                    {{ csrf_field() }}
                    <!-- Comment -->
                        <div class="margin-bottom-30">
                        <textarea name="comment" id="text" class="form-control" rows="6" placeholder="تعليقك"
                                  maxlength="1000"></textarea>
                        </div>

                        <input type="hidden" name="user_email" value="{{ Auth::user()->email }}"/>
                        <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                        <!-- Stars -->
                        <div class="product-star-vote">
                            <div class="row">
                                <label class="radio-inline">
                                    <input type="radio" name="value" value="1">1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="value" value="2"> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="value" value="3"> 3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="value" value="4"> 4
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="value" value="5"> 5
                                </label>
                            </div>


                        </div>

                        <!-- Send Button -->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> ارسل تقييمك</button>

                    </form>
                    <!-- /REVIEW FORM -->
                @endif

            </div>
        </div>


        <hr class="margin-top-80 margin-bottom-80"/>


        <div class="heading-title heading-dotted text-center">
            <h3 class="owl-featured">
                @if(app()->getLocale() == 'en')
                    Latest added
                @elseif(app()->getLocale() == 'ar')
                    المضاف حديثا
                @endif
                ً</h3>
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

                </div><!-- /item -->
            @endforeach

        </div>


    </div>
</section>
<!-- / -->
