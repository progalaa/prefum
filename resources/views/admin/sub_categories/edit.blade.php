@extends('layouts.app')

@section('content')
    <h3 class="page-title">الأقسام الفرعية</h3>
    {!! Form::model($sub_categories, ['method' => 'PUT', 'route' => ['admin.sub_categories.update', $sub_categories->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">تعديل قسم فرعي</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">

                </div>

                <div class="col-xs-6 form-group">
                    {!! Form::label('name_ar', 'الإسم عربي ', ['class' => 'control-label']) !!}
                    {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name_ar'))
                        <p class="help-block">
                            {{ $errors->first('name_ar') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">

                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('name_en', 'الإسم إنجليزي', ['class' => 'control-label']) !!}
                    {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name_en'))
                        <p class="help-block">
                            {{ $errors->first('name_en') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-8 form-group">

                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('category_id', 'القسم الرئيسي', ['class' => 'control-label']) !!}<br />
                    <select class="form-control" name="category_id" required>
                        <option value="{{$sub_categories->category->id}}">{{$sub_categories->category->name_ar ." -- ". $sub_categories->category->name_en}}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id  }}">{{ $category->name_ar ." -- ".$category->name_en}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit('تعديل', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

