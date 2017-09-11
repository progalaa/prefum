@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/admin/home') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">لوحه التحكم</span>
                </a>
            </li>

            <li class="{{ $request->segment(2) == 'products' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.products.index') }}">
                    <i class="fa fa-product-hunt"></i>
                            <span class="title">
                                المنتجات
                            </span>
                </a>
            </li>

            
            @can('users_manage')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">المستخدمين</span>
                    <!--<span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>-->
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                الصلاحيات
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                الوظيفة
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                المستخدمين
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan



            <li class="{{ $request->segment(2) == 'menus' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.menus.index') }}">
                    <i class="fa fa-server"></i>
                            <span class="title">
                                القائمة الرئيسية
                            </span>
                </a>
            </li>



            <li class="{{ $request->segment(2) == 'categories' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-folder-open-o"></i>
                            <span class="title">
                               الأقسام الرئيسية
                            </span>
                </a>
            </li>

            <li class="{{ $request->segment(2) == 'sub_categories' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.sub_categories.index') }}">
                    <i class="fa fa-folder-open-o"></i>
                            <span class="title">
                               الأقسام الفرعية
                            </span>
                </a>
            </li>


            <li class="{{ $request->segment(2) == 'brands' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.brands.index') }}">
                    <i class="fa fa-briefcase"></i>
                            <span class="title">
                                العلامات التجارية
                            </span>
                </a>
            </li>


            <li class="{{ $request->segment(2) == 'locations' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.locations.index') }}">
                    <i class="fa fa-location-arrow"></i>
                            <span class="title">
                               الفروع
                            </span>
                </a>
            </li>

            <li class="{{ $request->segment(2) == 'cart' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.cart.index') }}">
                    <i class="fa fa-cart-plus"></i>
                            <span class="title">
                               الطلبات
                            </span>
                </a>
            </li>

            <li class="{{ $request->segment(2) == 'cart_products' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.cart_products.index') }}">
                    <i class="fa fa-cart-arrow-down"></i>
                            <span class="title">
                               سجل الطلبات
                            </span>
                </a>
            </li>

            <li class="{{ $request->segment(2) == 'site_users' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.site_users.index') }}">
                    <i class="fa fa-users"></i>
                            <span class="title">
                               مستخدمي الموقع
                            </span>
                </a>
            </li>



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">تعديل كلمة المرور</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">تسجيل الخروج</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
