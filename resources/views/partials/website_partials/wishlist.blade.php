<section class="page-header page-header-xs">
    <div class="container">

        <!-- breadcrumbs -->
        <ol class="breadcrumb breadcrumb-inverse">
            <li><a href="#">الرئيسية</a></li>
            <li class="active">قائمة الأمنيات</li>
        </ol><!-- /breadcrumbs -->

    </div>
</section>


<!-- -->
<section>
    <div class="container">

        <!-- CART -->
        <div class="row">

            <!-- LEFT -->
            <div class="col-lg-9 col-sm-8">

                <!-- CART -->
                <form class="cartContent clearfix" method="post" action="#">

                    <!-- cart content -->
                    <div id="cartContent">
                        <!-- cart header -->
                        <div class="item head clearfix">
                            <span class="cart_img"></span>
                            <span class="product_name size-13 bold">اسم المنتج</span>
                            <span class="remove_item size-13 bold"></span>
                            <span class="total_price size-13 bold">السعر</span>
                        </div>
                        <!-- /cart header -->
                        <?php
                          $sum =0;
                        ?>
                    @foreach($wishlist as $wish)

                        <!-- cart item -->
                            <div class="item">
                                <div class="cart_img pull-left width-100 padding-10 text-left"><img
                                            src="{{ url('/public/images/'.$wish->products->image) }}" alt=""
                                            width="80"/></div>
                                <a href="{{route('product', [app()->getLocale(),$wish->product_id])}}"
                                   class="product_name">

                                    @if(app()->getLocale() == 'ar')
                                        <span>{{$wish->products->name_ar}}</span>
                                    @elseif(app()->getLocale() == 'en')
                                        <span>{{$wish->products->name_en}}</span>
                                    @endif
                                </a>

                                <input type="hidden" id="delete_url" value="{{ route('deleteWishlistItem') }}">

                                <a class="remove_item" id="remove_wishlist" data-id="{{$wish->id}}" data-user="{{ Auth::user()->id }}" data-product="{{$wish->product_id}}">
                                    <i class="fa fa-times"></i>
                                </a>
                                <div class="total_price">$<span>{{$wish->products->price}}</span></div>

                                <div class="clearfix"></div>

                                <?php
                                $sum += $wish->products->price;


                                ?>
                            </div>
                            <!-- /cart item -->
                    @endforeach


                    <!-- update cart -->
                        <a class="btn btn-success margin-top-20 margin-right-10 pull-right" href="{{route('wishlist',['locale'=>app()->getLocale()])}}"><i
                                    class="glyphicon glyphicon-ok"></i> تحديث
                        </a>

                        <!-- /update cart -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- /cart content -->

                </form>
                <!-- /CART -->

            </div>




        </div>
        <!-- /CART -->

    </div>
</section>
<!-- / -->