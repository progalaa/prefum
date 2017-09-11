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
                                <a href="#" class="remove_item"><i class="fa fa-times"></i></a>
                                <div class="total_price">$<span>{{$wish->products->price}}</span></div>

                                <div class="clearfix"></div>

                                <?php
                                $sum += $wish->products->price;


                                ?>
                            </div>
                            <!-- /cart item -->
                    @endforeach


                    <!-- update cart -->
                        <button class="btn btn-success margin-top-20 margin-right-10 pull-right"><i
                                    class="glyphicon glyphicon-ok"></i> تحديث
                        </button>
                        <button class="btn btn-danger margin-top-20 margin-right-10 pull-right"><i
                                    class="glyphicon glyphicon-remove"></i> مسح قائمة الامنيات
                        </button>
                        <!-- /update cart -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- /cart content -->

                </form>
                <!-- /CART -->

            </div>


            <!-- RIGHT -->
            <div class="col-lg-3 col-sm-4">

                <!-- TOGGLE -->
                <div class="toggle-transparent toggle-bordered-full clearfix">

                    <div class="toggle nomargin-top">
                        <label>بطاقة التخفيض</label>

                        <div class="toggle-content">
                            <p>أدخل كود التخفيض.</p>

                            <form action="#" method="post" class="nomargin">
                                <input type="text" id="cart-code" name="cart-code"
                                       class="form-control text-center margin-bottom-10" placeholder="Voucher Code"
                                       required="required">
                                <button class="btn btn-primary btn-block" type="submit">تأكيد</button>
                            </form>
                        </div>
                    </div>


                </div>
                <!-- /TOGGLE -->

                <div class="toggle-transparent toggle-bordered-full clearfix">
                    <div class="toggle active">
                        <div class="toggle-content">

										<span class="clearfix">
											<span class="pull-right">$<?php echo $sum; ?></span>
											<strong class="pull-left">السعر قبل الخصم:</strong>
										</span>
										<span class="clearfix">
											<span class="pull-right">$0.00</span>
											<span class="pull-left">تخفيض:</span>
										</span>
										<span class="clearfix">
											<span class="pull-right">$0.00</span>
											<span class="pull-left">الشخن:</span>
										</span>

                            <hr/>

										<span class="clearfix">
											<span class="pull-right size-20">$<?php echo $sum; ?></span>
											<strong class="pull-left">الاجمالى:</strong>
										</span>

                            <hr/>

                            <a href="shop-checkout.html" class="btn btn-primary btn-lg btn-block size-15"><i
                                        class="fa fa-mail-forward"></i> اكمل عملية الشراء</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /CART -->

    </div>
</section>
<!-- / -->