<div id="topBar" class="text-center padding-5 dark">
    <div class="container">
        <ul class="top-links list-inline pull-right">
            @if(Auth::user())
                <li class="text-welcome hidden-xs">
                    @if(app()->getLocale() == 'ar')
                        مرحباً <strong>{{ Auth::user()->name }}</strong>
                    @elseif(app()->getLocale() == 'en')
                        Welcome <strong>{{ Auth::user()->name }}</strong>
                    @endif
                </li>
            @endif
            <li>
                <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><i
                            class="fa fa-user hidden-xs"></i>
                    @if(app()->getLocale() == 'ar')
                        حسابي
                    @elseif(app()->getLocale() == 'en')
                        My Account
                    @endif
                </a>
                <ul class="dropdown-menu pull-right">
                    @if(Auth::user())
                        <li><a tabindex="-1" href="{{route('wishlist',['locale'=>app()->getLocale()])}}"><i
                                        class="fa fa-heart"></i>
                                @if(app()->getLocale() == 'ar')
                                    قائمة الأمنيات
                                @elseif(app()->getLocale() == 'en')
                                    Wishlist
                                @endif
                            </a></li>
                        <li class="divider"></li>

                        <li><a tabindex="-1" href="{{route('Webcart',['locale'=>app()->getLocale()])}}"><i
                                        class="fa fa-heart"></i>
                                @if(app()->getLocale() == 'ar')
                                    عربة التسوق
                                @elseif(app()->getLocale() == 'en')
                                    Shopping Cart
                                @endif
                            </a></li>
                        <li class="divider"></li>

                        <li class="divider"></li>
                        <li><a tabindex="-1" href="{{route('auth.logout', ['locale' => app()->getLocale()])}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="glyphicon glyphicon-off"></i>
                                @if(app()->getLocale() == 'ar')
                                    تسجيل خروج
                                @elseif(app()->getLocale() == 'en')
                                    Logout
                                @endif

                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </a></li>
                    @else
                        <li><a tabindex="-1" href="{{route('login', ['locale' => app()->getLocale()])}}">
                                @if(app()->getLocale() == 'ar')
                                    تسجيل
                                @elseif(app()->getLocale() == 'en')
                                    Register
                                @endif
                            </a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="{{route('login', ['locale' => app()->getLocale()])}}">
                                @if(app()->getLocale() == 'ar')
                                    تسجيل دخول
                                @elseif(app()->getLocale() == 'en')
                                    Login
                                @endif
                            </a></li>
                        <li class="divider"></li>
                    @endif
                </ul>
            </li>

        </ul>
        <!-- Logo -->
        <a class="logo" href="{{route('home', [app()->getLocale()])}}">
            <img src="{{ url('/public/images/logo_dark.png') }}" alt=""/>


        </a>
        <ul class="top-links list-inline">
            <li><a href="#">
                    @if(app()->getLocale() == 'ar')
                        <?php
                        $curr_url = $_SERVER['REQUEST_URI'];
                        $fin_url = str_replace("/ar", "/en", $curr_url);
                        ?>
                        <a href="<?php echo $fin_url;?>"> ENGLISH</a>
                    @elseif(app()->getLocale() == 'en')
                        <?php
                        $curr_url = $_SERVER['REQUEST_URI'];
                        $fin_url = str_replace("/en", "/ar", $curr_url);
                        ?>
                        <a href="<?php echo $fin_url;?>"> عــربي</a>
                    @endif
                </a></li>
            <li>
                <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><img class="flag-lang"
                                                                                                  src="{{ url('/public/images/flags/kw.png') }}"
                                                                                                  width="16" height="11"
                                                                                                  alt="lang">
                    @if(app()->getLocale() == 'ar')
                        الكويت
                    @elseif(app()->getLocale() == 'en')
                        Kuwait
                    @endif

                </a>
                <ul class="dropdown-langs dropdown-menu">

                    <li class="divider"></li>


                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- /Top Bar -->


<!--
    AVAILABLE HEADER CLASSES

    Default nav height: 96px
    .header-md 		= 70px nav height
    .header-sm 		= 60px nav height

    .noborder 		= remove bottom border (only with transparent use)
    .transparent	= transparent header
    .translucent	= translucent header
    .sticky			= sticky header
    .static			= static header
    .dark			= dark header
    .bottom			= header on bottom

    shadow-before-1 = shadow 1 header top
    shadow-after-1 	= shadow 1 header bottom
    shadow-before-2 = shadow 2 header top
    shadow-after-2 	= shadow 2 header bottom
    shadow-before-3 = shadow 3 header top
    shadow-after-3 	= shadow 3 header bottom

    .clearfix		= required for mobile menu, do not remove!

    Example Usage:  class="clearfix sticky header-sm transparent noborder"
-->
<div id="header" class="sticky header-sm clearfix">

    <!-- TOP NAV -->
    <header id="topNav">
        <div class="container">

            <!-- Mobile Menu Button -->
            <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>

            <!-- BUTTONS -->
            <ul class="pull-right nav nav-pills nav-second-main">

                <!-- SEARCH -->
                <li class="search">
                    <a href="javascript:;">
                        <i class="fa fa-search"></i>
                    </a>
                    <div class="search-box">
                        <form action="page-search-result-1.html" method="get">
                            <div class="input-group">
                                <input type="text" name="src" placeholder="Search" class="form-control"/>
											<span class="input-group-btn">
												<button class="btn btn-primary" type="submit">Search</button>
											</span>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- /SEARCH -->

            @if(Auth::user())
                <!-- QUICK SHOP CART -->
                    <li class="quick-cart">
                        <a href="#">
                            <span class="badge badge-aqua btn-xs badge-corner">1</span>
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="quick-cart-box">
                            <h4>عربة التسوق</h4>

                            <div class="quick-cart-wrapper">


                            </div>

                            <!-- quick cart footer -->
                            <div class="quick-cart-footer clearfix">
                                <a href="" class="btn btn-primary btn-xs pull-right">شاهد العربة</a>
                                <span class="pull-left"><strong>الاجمالى:</strong>{{Session::get('cart_total')}}</span>
                            </div>
                            <!-- /quick cart footer -->

                        </div>
                    </li>
                    <!-- /QUICK SHOP CART -->
                @endif

            </ul>
            <!-- /BUTTONS -->

            <!--
                Top Nav

                AVAILABLE CLASSES:
                submenu-dark = dark sub menu
            -->
            <div class="navbar-collapse pull-left nav-main-collapse collapse">
                <nav class="nav-main">

                    <!--
                        NOTE

                        For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
                        Direct Link Example:

                        <li>
                            <a href="#">HOME</a>
                        </li>
                    -->
                    <ul id="topMain" class="nav nav-pills nav-main">
                        @foreach($Menu as $men)
                            <li class="dropdown active mega-menu"><!-- PORTFOLIO -->
                                <a href="{{route('menu', [app()->getLocale(),$men->id])}}">
                                    @if(app()->getLocale() == 'en')
                                        {{$men->name_en}}
                                    @elseif(app()->getLocale() == 'ar')
                                        {{$men->name_ar}}
                                    @endif
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            @foreach($men->categories as $cat)
                                                <div class="col-md-5th">
                                                    <ul class="list-unstyled">
                                                        <a href="{{route('category', [app()->getLocale(),$cat->id])}}">
                                                            <h4 class="text-right margin-0">
                                                                @if(app()->getLocale() == 'en')
                                                                    {{$cat->name_en}}
                                                                @elseif(app()->getLocale() == 'ar')
                                                                    {{$cat->name_ar}}
                                                                @endif


                                                            </h4>
                                                        </a>
                                                        @foreach($cat->subcats as $sub)
                                                            <li>
                                                                <a href="{{route('subCat', [app()->getLocale(),$sub->id])}}">
                                                                    @if(app()->getLocale() == 'en')
                                                                        {{$sub->name_en}}
                                                                    @elseif(app()->getLocale() == 'ar')
                                                                        {{$sub->name_ar}}
                                                                    @endif

                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach

                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                </nav>
            </div>

        </div>
    </header>
    <!-- /Top Nav -->

</div>
