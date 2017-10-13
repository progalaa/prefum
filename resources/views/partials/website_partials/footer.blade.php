<!-- FOOTER -->
<footer id="footer">
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <!-- Footer Logo -->
                <img class="footer-logo img-responsive" src="{{ url('/public/images/logo_dark.png') }}" alt=""/>


            </div>

            <div class="col-md-3">

                <!-- Latest Blog Post -->
                <h4 class="letter-spacing-1">
                    @if(app()->getLocale() == 'ar')
                        أخر العروض
                    @elseif(app()->getLocale() == 'en')
                        Latest Orders
                    @endif
                </h4>
                <ul class="footer-posts list-unstyled">
                    @foreach($latest3 as $lat)
                        <li>
                            <a href="{{route('product', [app()->getLocale(),$lat->id])}}">
                                @if(app()->getLocale() == 'en')
                                    {{$lat->name_en}}
                                @elseif(app()->getLocale() == 'ar')
                                    {{$lat->name_ar}}
                                @endif
                            </a>
                            <small>{{$lat->created_at}}</small>
                        </li>
                    @endforeach

                </ul>
                <!-- /Latest Blog Post -->

            </div>

            <div class="col-md-2">

                <!-- Links -->
                <h4 class="letter-spacing-1">اكتشف موقعنا</h4>
                <ul class="footer-links list-unstyled">
                    <li><a href="{{route('home', [app()->getLocale()])}}">الرئيسية</a></li>
                    <li><a href="{{route('about', [app()->getLocale()])}}">من نحن</a></li>
                    <li><a href="{{route('contact', [app()->getLocale()])}}">اتصل بنا</a></li>
                    <li><a href="#">اشهر الماركات</a></li>

                </ul>
                <!-- /Links -->

            </div>

            <div class="col-md-4">

                <!-- Newsletter Form -->
                <h4 class="letter-spacing-1">تواصل معنا</h4>
                <p>اشترك ليصلك كل جديد موقعنا و اخر عروضنا</p>

                <form action="{{ route('AddEmail') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control required"
                               placeholder="ادخل البريد الالكترونى الخاص بك" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">اشترك معنا</button>
                                </span>
                    </div>
                </form>
                <!-- /Newsletter Form -->

                <!-- Social Icons -->
                <div class="margin-top-20">
                    <a href="#" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip"
                       data-placement="top" title="Facebook">

                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="#" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip"
                       data-placement="top" title="Twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>

                    <a href="#" class="social-icon social-icon-border social-youtube pull-left" data-toggle="tooltip"
                       data-placement="top" title="youtube">
                        <i class="icon-youtube"></i>
                        <i class="icon-youtube"></i>
                    </a>

                </div>
                <!-- /Social Icons -->

            </div>

        </div>

    </div>

    <div class="copyright">
        <div class="container">
            <ul class="pull-right nomargin list-inline mobile-block">
                <li><a href="#">Design &amp; Develope by </a></li>
                <li>&bull;</li>
            </ul>
            &copy; All Rights Reserved, Company LTD
        </div>
    </div>
</footer>
<!-- /FOOTER -->

</div>
<!-- /wrapper -->


<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>


<!-- PRELOADER -->
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div><!-- /PRELOADER -->