@extends('layouts.app')

@section('content')
    <h3 class="page-title">القائمة الرئيسية</h3>
    {!! Form::model($menu, ['method' => 'PUT', 'route' => ['admin.menus.update', $menu->id]]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">تعديل عناصر القائمة</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name_ar', 'الإسم عربي ', ['class' => 'control-label']) !!}
                    {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name_ar'))
                        <p class="help-block">
                            {{ $errors->first('name_ar') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('name_en', 'الإسم إنجليزي', ['class' => 'control-label']) !!}
                    {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name_en'))
                        <p class="help-block">
                            {{ $errors->first('name_en') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit('تعديل', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

