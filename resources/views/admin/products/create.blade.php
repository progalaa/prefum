@extends('layouts.app')
@section('content')
    <h3 class="page-title">المنتجات</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.products.store'] , 'files' => true, 'enctype' =>"multipart/form-data"]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">إضافة منتج</div>


        <div class="panel-body">
            <div class="row">

                <div class="col-xs-12 form-group">

                    <div class="col-md-6 form-group">
                        {!! Form::label('name_en', 'الإسم إنجليزي ', ['class' => 'control-label']) !!}
                        {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('name_en'))
                            <p class="help-block">
                                {{ $errors->first('name_en') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        {!! Form::label('name_ar', 'الاسم عربي', ['class' => 'control-label']) !!}
                        {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('name_ar'))
                            <p class="help-block">
                                {{ $errors->first('name_ar') }}
                            </p>
                        @endif
                    </div>
                </div>


                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('title_en', 'العنوان إنجليزي', ['class' => 'control-label']) !!}
                        {!! Form::text('title_en', old('title_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title_en'))
                            <p class="help-block">
                                {{ $errors->first('title_en') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        {!! Form::label('title_ar', 'العنوان عربي ', ['class' => 'control-label']) !!}
                        {!! Form::text('title_ar', old('title_ar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title_ar'))
                            <p class="help-block">
                                {{ $errors->first('title_ar') }}
                            </p>
                        @endif
                    </div>


                </div>

                <div class="col-xs-12 form-group">

                    <div class="col-md-6 form-group">
                        {!! Form::label('description_en', 'الوصف إنجليزي ', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description_en', old('description_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('description_en'))
                            <p class="help-block">
                                {{ $errors->first('description_en') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        {!! Form::label('description_ar', 'الوصف عربي', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('description_ar'))
                            <p class="help-block">
                                {{ $errors->first('description_ar') }}
                            </p>
                        @endif
                    </div>


                </div>

                <div class="col-xs-12 form-group">

                    <div class="col-md-6 form-group">
                        {!! Form::label('price', 'السعر ', ['class' => 'control-label']) !!}
                        {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('price'))
                            <p class="help-block">
                                {{ $errors->first('price') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        {!! Form::label('image', 'الصورة', ['class' => 'control-label']) !!}
                        {!! Form::file('image', old('image'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('image'))
                            <p class="help-block">
                                {{ $errors->first('image') }}
                            </p>
                        @endif
                    </div>

                </div>

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                    </div>

                    <div class="col-md-6 form-group">
                        {!! Form::label('images', 'البوم صور', ['class' => 'control-label']) !!}
                        <input type="file" name="images[]" multiple />
                        <p class="help-block"></p>
                        @if($errors->has('images'))
                            <p class="help-block">
                                {{ $errors->first('images') }}
                            </p>
                        @endif
                    </div>

                </div>


                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('execlusive', 'حصري', ['class' => 'control-label']) !!}<br/>


                        <select class="form-control" name="execlusive">
                            <option value=""></option>
                            <option value="1">نعم</option>
                            <option value="0">لا</option>
                        </select>
                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('offer', 'عروض', ['class' => 'control-label']) !!}<br/>


                        <select class="form-control" name="offer">
                            <option value=""></option>
                            <option value="1">نعم</option>
                            <option value="0">لا</option>
                        </select>
                    </div>

                </div>

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('category_id', 'القسم الرئيسي', ['class' => 'control-label']) !!}<br/>
                        <select class="form-control" name="category_id">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id  }}">{{ $category->name_ar }}
                                    -- {{ $category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('menu_item_id', 'القائمة', ['class' => 'control-label']) !!}<br/>


                        <select class="form-control" name="menu_item_id">
                            <option value=""></option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id  }}">{{ $menu->name_ar }} -- {{ $menu->name_en }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('brand_id', 'العلامة التجارية', ['class' => 'control-label']) !!}<br/>


                        <select class="form-control" name="brand_id">
                            <option value=""></option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id  }}">{{ $brand->name_ar }}
                                    -- {{ $brand->name_en }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('sub_category_id', 'القسم الفرعي', ['class' => 'control-label']) !!}<br/>


                        <select class="form-control" name="sub_category_id">
                            <option value=""></option>
                            @foreach ($sub_categories as $sub_category)
                                <option value="{{ $sub_category->id  }}">{{ $sub_category->name_ar }}
                                    -- {{ $sub_category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">

                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('status', 'حاله المنتج', ['class' => 'control-label']) !!}<br/>


                        <select class="form-control" name="status">
                            <option value=""></option>
                            <option value="0">عدم نشر</option>
                            <option value="1">نشر</option>

                        </select>
                    </div>

                </div>


            </div>

        </div>
    </div>

    {!! Form::submit('حفظ', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

