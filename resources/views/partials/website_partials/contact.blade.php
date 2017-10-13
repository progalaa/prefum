<section class="page-header page-header-xs">
    <div class="container">

        <!-- breadcrumbs -->
        <ol class="breadcrumb breadcrumb-inverse">
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">إتصل بنا</a></li>
        </ol><!-- /breadcrumbs -->

    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="side-nav margin-bottom-60">

                    <div class="col-md-12">




                            <!-- FORM -->
                            <div class="col-md-9 col-sm-9 col-lg-push-1 col-md-push-1 col-sm-push-1">

                                <h3>إتصل بنا</h3>


                                <form action="{{route('email',['locale'=>app()->getLocale()])}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <fieldset>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="contact:name">الإسم </label>
                                                    <input required type="text" class="form-control"
                                                           name="name">
                                                </div>


                                                <div class="row">
                                                    <div class="form-group">

                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="contact:name">البريد الإلكتروني</label>
                                                    <input required type="email" class="form-control"
                                                           name="email">
                                                </div>


                                                <div class="row">
                                                    <div class="form-group">

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="contact:name">رقم التليفون</label>
                                                    <input required type="text" class="form-control"
                                                           name="phone">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="contact:message">محتوي الرسالة</label>
                                    <textarea required maxlength="10000" rows="8" class="form-control"
                                              name="message"></textarea>
                                                </div>

                                            </div>
                                        </div>

                                    </fieldset>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                                                إرسال
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /FORM -->


                        </div>


                    </div>

                </div>
            </div>
            <div class="col-md-7">
                <h2>موقعنا</h2>


                <div id="map_contact">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1781287.9237473905!2d46.41436905551802!3d29.30938826981875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fc5363fbeea51a1%3A0x74726bcd92d8edd2!2sKuwait!5e0!3m2!1sen!2seg!4v1507188848876" width="750" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                <hr />

                <p>
                    <span class="block"><strong><i class="fa fa-map-marker"></i> العنوان:</strong> 15 السالمية ,الكويت</span>
                    <span class="block"><strong><i class="fa fa-phone"></i> تليفون:</strong> <a href="tel:1800-555-1234">1800-555-1234</a></span>
                    <span class="block"><strong><i class="fa fa-envelope"></i> البريد الإليكتروني:</strong> <a href="mailto:mail@yourdomain.com">mail@yourdomain.com</a></span>
                </p>
            </div>
        </div>
    </div>
    <!-- FEATURED -->

</section>

