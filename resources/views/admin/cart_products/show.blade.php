@extends('layouts.app')

@section('content')
    <h3 class="page-title">تفاصيل الطلب</h3>

    <div class="panel panel-default">
        <div class="panel-heading"><h3> رقم الطلب  >> {{ $carts->id }}</h3></div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-10">{{ $carts->user->prefix_ar." . ".$carts->user->first_name." ".$carts->user->last_name }}</div>
                    <div class="col-xs-2">الإسم بالكامل</div>
                </div>
                <br/><hr>
                <div class="col-xs-12">
                    <div class="col-xs-10">{{$carts->user->email}}</div>
                    <div class="col-xs-2">البريد الإلكتروني</div>
                </div>
                <br/><hr>
                <div class="col-xs-12">
                    <div class="col-xs-10">{{$carts->user->telephone}}</div>
                    <div class="col-xs-2">رقم التليفون</div>
                </div>
                <br/><hr>
                <div class="col-xs-12">
                    <div class="col-xs-10">{{ $carts->user->street_adress." , ".$carts->user->city." , ".$carts->user->country }}</div>
                    <div class="col-xs-2">العنوان</div>
                </div>
                <br/><br/><hr><hr>
                <div class="col-xs-12"  dir="rtl">
                    <div class="col-xs-10">
                        {!! Form::model($carts, ['method' => 'PUT', 'route' => ['admin.cart.update', $carts->id]]) !!}
                        <div class="col-xs-4" >

                        </div>
                        <div class="col-xs-2">
                            {!! Form::submit('حفظ', ['class' => 'btn btn-success']) !!}
                            <a href="{{ route('admin.cart.index') }}" class="btn btn-danger">رجوع</a>

                        </div>
                        <div class="col-xs-6">
                            <select class="form-control" name="state">
                                <option value="{{$carts->state}}"><?php echo $state[$carts->state];?></option>
                                <?php
                                foreach($state as $st => $val){
                                    echo "<option value='$st'>$val</option>";
                                }
                                ?>
                            </select>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    <div class="col-xs-2">حالة الطلب</div>
                </div>
            </div>
        </div>
        <div class="panel-heading"><h3>المنتجات</h3></div>

        <div class="panel-body" dir="rtl">
            <div class="row">
                <div class="col-xs-12" >
                    <div class="col-xs-1"></div>
                    <div class="col-xs-1">التكلفة الكلية</div>
                    <div class="col-xs-2">تكلفة الوحدة</div>
                    <div class="col-xs-2">الكمية</div>
                    <div class="col-xs-2">عنوان المنتج</div>
                    <div class="col-xs-2">الصورة</div>
                    <div class="col-xs-2">رقم المنتج</div>
                </div>
                <br/><hr>
                @foreach($carts->cartProducts as $product)
                <div class="col-xs-12" >
                    <div class="col-xs-1">{{$product->id}}</div>
                    <div class="col-xs-1">{{$product->price}}</div>
                    <div class="col-xs-2">{{$product->id}}</div>
                    <div class="col-xs-2">{{$product->qty}}</div>
                    <div class="col-xs-2">{{$product->id}}</div>
                    <div class="col-xs-2">{{$product->product_id}}</div>
                    <div class="col-xs-2">{{$product->product_id}}</div>
                </div>
                <br/><hr>
                @endforeach
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-10"><h3>100 $</h3></div>
                    <div class="col-xs-2"><h3>إجمالي الفاتورة</h3></div>
                </div>
            </div>
        </div>

        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-4"><h3><button onclick="print()">طباعة الفاتورة </button> </h3></div>
                    <div class="col-xs-4"><h3>المطلوب دفعه : 100 $</h3></div>
                    <div class="col-xs-4"></div>
                </div>
            </div>
        </div>


    </div>



@stop

