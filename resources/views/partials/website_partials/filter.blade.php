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

<div class="side-nav margin-bottom-60">

    <form action="{{route('filter', [app()->getLocale()])}}" id="filterForm" method="GET">
        <ul class="list-group list-group-bordered list-group-noicon uppercase">
            <li class="list-group-item active">
                <a class="dropdown-toggle" href="#">
                    @if(app()->getLocale() == 'ar')
                        التصنيف
                    @elseif(app()->getLocale() == 'en')
                        Category
                    @endif
                </a>
                <ul>
                    @foreach($category as $cat)
                        <li><a href="{{route('category', [app()->getLocale(),$cat->id])}}">
                                @if(app()->getLocale() == 'ar')
                                    {{$cat->name_ar}}
                                @elseif(app()->getLocale() == 'en')
                                    {{$cat->name_en}}
                                @endif

                            </a></li>
                    @endforeach
                </ul>
            </li>
            <li class="list-group-item active">
                <a class="dropdown-toggle" href="#">
                    @if(app()->getLocale() == 'ar')
                        الماركات
                    @elseif(app()->getLocale() == 'en')
                        Brands
                    @endif
                </a>

                <ul>
                    @foreach($brands as $brand)
                        <li>
                            <input type="hidden" id="filter_url"
                                   value="{{route('filter',['locale'=>app()->getLocale(),'branding','prices'])}}">
                            <a href="#">
                                <label class="checkbox">
                                    <?php
                                    $brand_checked = \Illuminate\Support\Facades\Input::get('brand');
                                    if (!isset($brand_checked))
                                        $brand_checked[] = 0;

                                    $price_checked = \Illuminate\Support\Facades\Input::get('price');
                                    if (!isset($price_checked))
                                        $price_checked[] = 0;
                                    ?>
                                    @if(in_array($brand->id,$brand_checked))
                                        <input class="checkCheckd" type="checkbox" name="brand[]" value="{{$brand->id}}"
                                               id="brand.{{$brand->id}}" style="display: none" checked>
                                    @else
                                        <input class="checkCheckd" type="checkbox" name="brand[]" value="{{$brand->id}}"
                                               id="brand.{{$brand->id}}" style="display: none">
                                    @endif
                                    <i></i>
                                    @if(app()->getLocale() == 'ar')
                                        {{$brand->name_ar}}
                                    @elseif(app()->getLocale() == 'en')
                                        {{$brand->name_en}}
                                    @endif
                                </label>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </li>
            <li class="list-group-item active">
                <a class="dropdown-toggle" href="#">
                    @if(app()->getLocale() == 'ar')
                        الأسعار
                    @elseif(app()->getLocale() == 'en')
                        Prices
                    @endif
                </a>
                <?php

                function Check($val ,$val2)
                {
                    if($val == $val2){
                        return true;
                    }else{
                        return false;
                    }
                }
                   // echo $price_checked;
                    //dd(Check("100-300",$price_checked));
                ?>
                <ul>
                    <li>
                        <label class="checkbox">
                            <input type="radio" class="checkCheckd" name="price" value="0-100" id="cat1"
                                    {{ ($price_checked == "100-300") ? 'checked="true"' : '' }} >
                            <i></i>
                            < 100 $
                        </label>
                    </li>

                    <li>
                        <label class="checkbox">
                            <input type="radio" class="checkCheckd" name="price" value="100-300" id="cat1"
                                   {{ ($price_checked == "100-300") ? 'checked="true"' : '' }}
                                   >
                            <i></i>
                            (100 - 300)
                        </label>
                    </li>

                    <li>
                        <label class="checkbox">
                            <input type="radio" class="checkCheckd" name="price" value="300-500" id="cat1"
                                   {{ ($price_checked == "300-500") ? 'checked="true"' : '' }} >
                            <i></i>
                            (300 - 500)
                        </label>
                    </li>

                    <li>
                        <label class="checkbox">
                            <input type="radio" class="checkCheckd" name="price" value="500-1000" id="cat1"
                                   {{ ($price_checked == "500-1000") ? 'checked="true"' : '' }} >
                            <i></i>
                            (500 - 1000)
                        </label>
                    </li>

                    <li>
                        <label class="checkbox">
                            <input type="radio" class="checkCheckd" name="price" value="1000-10000000" id="cat1"
                                   {{ ($price_checked == "1000-10000000") ? 'checked="true"' : '' }} >
                            <i></i>
                            > 1000 $
                        </label>
                    </li>

                </ul>
            <!--<input type="hidden" id="filter_url" value="{{ route('filter',['locale'=>app()->getLocale(),'branding'=>'','prices'=>'']) }}">
                <button class="btn btn-primary" id="filt" type="submit">filter</button>-->
            </li>


        </ul>
    </form>
</div>