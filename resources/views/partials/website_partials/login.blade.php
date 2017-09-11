<section class="page-header page-header-xs">
    <div class="container">

        <!-- breadcrumbs -->
        <ol class="breadcrumb breadcrumb-inverse">
            <li><a href="#">الرئيسية</a></li>
            <li class="active">تسجيل الدخول</li>
        </ol><!-- /breadcrumbs -->

    </div>
</section>


<!-- -->
<section>
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <div class="toggle toggle-transparent toggle-accordion toggle-noicon">

                    <div class="toggle active">
                        <label class="size-20"><i class="fa fa-leaf"></i> &nbsp; مسجل بالفعل !</label>
                        <div class="toggle-content">


                            <form class="sky-form" role="form" method="POST" action="{{ url('login') }}">
                                <div class="clearfix">
                                {{ csrf_field() }}

                                <!-- Email -->
                                    <div class="form-group">
                                        <label>البريد الالكترونى</label>
                                        <label class="input margin-bottom-10">
                                            <i class="ico-append fa fa-envelope"></i>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                            <b class="tooltip tooltip-bottom-right">ادخل بريدك الالكترونى للتأكد من
                                                هويتك !</b>
                                        </label>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label>كلمة المرور</label>
                                        <label class="input margin-bottom-10">
                                            <i class="ico-append fa fa-lock"></i>
                                            <input id="password" type="password" class="form-control" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                            <b class="tooltip tooltip-bottom-right">أدخل كلمة المرور الخاصة بك</b>
                                        </label>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 col-sm-6 col-xs-6">

                                        <!-- Inform Tip -->
                                        <div class="form-tip pt-20">
                                            <a class="no-text-decoration size-13 margin-top-10 block bold" href="#">نسيت
                                                كلمة المرور?</a>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">

                                        <button class="btn btn-primary"><i class="fa fa-check"></i> تسجيل الدخول
                                        </button>

                                    </div>

                                </div>

                            </form>


                        </div>
                    </div>

                    <div class="toggle">
                        <label class="size-20"><i class="glyphicon glyphicon-user"></i> &nbsp; ليس لديك حساب؟ </label>
                        <div class="toggle-content">


                            <form class="nomargin sky-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <fieldset>

                                    <div class="row">
                                        <div class="form-group">

                                            <div class="col-md-12 col-sm-12">
                                                <label>الاسم  *</label>
                                                <label class="input margin-bottom-10">
                                                    <i class="ico-append fa fa-user"></i>
                                                    <input id="name" type="text" class="form-control"
                                                           name="name" placeholder="Full Name"
                                                           value="{{ old('name') }}" required>
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                    <b class="tooltip tooltip-bottom-right">اكتب اسمك</b>
                                                </label>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">

                                            <div class="col-md-6 col-sm-6">
                                                <label for="register:email">الربيد الالكترونى *</label>
                                                <label class="input margin-bottom-10">
                                                    <i class="ico-append fa fa-envelope"></i>
                                                    <input id="email" type="email" class="form-control" name="email"
                                                           value="{{ old('email') }}" placeholder="email" required>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                    @endif
                                                    <b class="tooltip tooltip-bottom-right">البريد الالكترونى</b>
                                                </label>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <label for="register:phone">رقم الهاتف</label>
                                                <label class="input margin-bottom-10">
                                                    <i class="ico-append fa fa-phone"></i>
                                                    <input id="phone" type="text" class="form-control"
                                                    name="phone" placeholder="phone"
                                                    value="{{ old('phone') }}" required>
                                                    <b class="tooltip tooltip-bottom-right">رقم الهاتف (اختيار)</b>
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">

                                            <div class="col-md-6 col-sm-6">
                                                <label for="register:pass1">كلمة المرور *</label>
                                                <label class="input margin-bottom-10">
                                                    <i class="ico-append fa fa-lock"></i>
                                                    <input id="password" type="password" class="form-control" name="password"
                                                           placeholder="Password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                    @endif
                                                    <b class="tooltip tooltip-bottom-right">يجب كتابة 8 حروف او ارقام
                                                        على الاقل</b>
                                                </label>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <label for="register:pass2">كلمة المرور مرة اخرى *</label>
                                                <label class="input margin-bottom-10">
                                                    <i class="ico-append fa fa-lock"></i>
                                                    <input type="password" class="err">
                                                    <b class="tooltip tooltip-bottom-right">اعد كتابة كلمة المرور</b>
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <hr/>

                                    <label class=" nomargin text-right"><input class="margin-left-10" type="checkbox"
                                                                               name="checkbox"><i></i>اوافق على <a
                                                href="#" data-toggle="modal" data-target="#termsModal">الشروط و
                                            الاحكام</a></label>

                                </fieldset>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> سجل
                                        </button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
<!-- / -->


<!-- MODAL -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModal">الشروط &amp; الاحكام</h4>
            </div>

            <div class="modal-body modal-short">
                <h4><b>الشروط و الاحكام</b></h4>
                <p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في
                    صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما
                    قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع
                    شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في
                    الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت"
                    (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر
                    الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.

                </p>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-primary" id="terms-agree"><i class="fa fa-check"></i> اوافق
                </button>


            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /MODAL -->

