@extends('layouts.app')
@section('content')
    <h3 class="page-title">مستخدمي الموقع</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.site_users.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">إضافة مستخدم</div>

        <div class="panel-body">
            <div class="row">

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">

                    </div>
                    <div class="col-md-6 form-group">
                        {!! Form::label('prefix_ar', 'اللقب', ['class' => 'control-label']) !!}<br />

                        <select class="form-control" name="prefix_ar">
                            <option value=""></option>
                            <option value="MR">MR</option>
                            <option value="MRS">MRS</option>
                            <option value="DR">DR</option>
                            <option value="ENG">ENG</option>

                        </select>
                    </div>
                </div>


                <div class="col-xs-12 form-group">

                    <div class="col-md-6 form-group">
                        {!! Form::label('last_name', 'الإسم الاخير ', ['class' => 'control-label']) !!}
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('last_name'))
                            <p class="help-block">
                                {{ $errors->first('last_name') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        {!! Form::label('first_name', 'الاسم الأول', ['class' => 'control-label']) !!}
                        {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('first_name'))
                            <p class="help-block">
                                {{ $errors->first('first_name') }}
                            </p>
                        @endif
                    </div>


                </div>

                <div class="col-xs-12 form-group">

                    <div class="col-md-6 form-group">
                        {!! Form::label('telephone', 'رقم الموبايل ', ['class' => 'control-label']) !!}
                        {!! Form::text('telephone', old('telephone'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('telephone'))
                            <p class="help-block">
                                {{ $errors->first('telephone') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        {!! Form::label('email', 'البريد الإليكتروني', ['class' => 'control-label']) !!}
                        {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('email'))
                            <p class="help-block">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>


                </div>

                <div class="col-xs-12 form-group">

                    <div class="col-md-6 form-group">
                        {!! Form::label('street_adress_2', 'العنوان 2 ', ['class' => 'control-label']) !!}
                        {!! Form::text('street_adress_2', old('street_adress_2'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('street_adress_2'))
                            <p class="help-block">
                                {{ $errors->first('street_adress_2') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        {!! Form::label('street_adress', 'العنوان 1 ', ['class' => 'control-label']) !!}
                        {!! Form::text('street_adress', old('street_adress'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('street_adress'))
                            <p class="help-block">
                                {{ $errors->first('street_adress') }}
                            </p>
                        @endif
                    </div>


                </div>

                <div class="col-xs-12 form-group">
                    <div class="col-md-6 form-group">
                        {!! Form::label('country', 'الدولة', ['class' => 'control-label']) !!}<br />


                        <select class="form-control" name="country">
                            <option value=""></option>
                            <option value="Egypt">Egypt</option>
                            <option value="KSA">KSA</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Turkey">Turkey</option>

                        </select>
                    </div>


                    <div class="col-md-6 form-group">
                        {!! Form::label('city', 'المدينة', ['class' => 'control-label']) !!}<br />


                        <select class="form-control" name="city">
                            <option value=""></option>
                            <option value="Cairo">Cairo</option>
                            <option value="Riadh">Riadh</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Istanbul">Istanbul</option>

                        </select>
                    </div>

                </div>




            </div>

        </div>
    </div>

    {!! Form::submit('حفظ', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

