@extends('layouts.app')

@section('content')
    <h3 class="page-title">الصلاحيات </h3>
    
    {!! Form::model($permission, ['method' => 'PUT', 'route' => ['admin.permissions.update', $permission->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">تعديل الصلاحية </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'اسم الصلاحية *', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('تعديل', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

