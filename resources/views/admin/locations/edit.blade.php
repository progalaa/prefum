@extends('layouts.app')

@section('content')
    <h3 class="page-title">الأفرع</h3>
    {!! Form::model($location, ['method' => 'PUT', 'route' => ['admin.locations.update', $location->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">تعديل فرع</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('city_en', 'المدينة إنجليزي', ['class' => 'control-label']) !!}
                        {!! Form::text('city_en', old('city_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('city_en'))
                            <p class="help-block">
                                {{ $errors->first('city_en') }}
                            </p>
                        @endif
                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('city_ar', 'المدينة عربي ', ['class' => 'control-label']) !!}
                        {!! Form::text('city_ar', old('city_ar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('city_ar'))
                            <p class="help-block">
                                {{ $errors->first('city_ar') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('country_en', 'الدولة إنجليزي', ['class' => 'control-label']) !!}
                        {!! Form::text('country_en', old('country_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('country_en'))
                            <p class="help-block">
                                {{ $errors->first('country_en') }}
                            </p>
                        @endif
                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('country_ar', 'الدولة عربي ', ['class' => 'control-label']) !!}
                        {!! Form::text('country_ar', old('country_ar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('country_ar'))
                            <p class="help-block">
                                {{ $errors->first('country_ar') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('street_en', 'الشارع إنجليزي', ['class' => 'control-label']) !!}
                        {!! Form::text('street_en', old('street_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('street_en'))
                            <p class="help-block">
                                {{ $errors->first('street_en') }}
                            </p>
                        @endif
                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('street_ar', 'الشارع عربي ', ['class' => 'control-label']) !!}
                        {!! Form::text('street_ar', old('street_ar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('street_ar'))
                            <p class="help-block">
                                {{ $errors->first('street_ar') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('lat', 'دوائر العرض', ['class' => 'control-label']) !!}
                        {!! Form::number('lat', old('lat'), ['class' => 'form-control', 'placeholder' => '', 'required' => '' ,'step'=> '0.0000000000001']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('lat'))
                            <p class="help-block">
                                {{ $errors->first('lat') }}
                            </p>
                        @endif
                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('lng', 'خطوط الطول ', ['class' => 'control-label']) !!}
                        {!! Form::number('lng', old('lng'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','step'=> '0.0000000000001']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('lng'))
                            <p class="help-block">
                                {{ $errors->first('lng') }}
                            </p>
                        @endif
                    </div>
                </div>




            </div>

        </div>
    </div>

    {!! Form::submit('تعديل', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

