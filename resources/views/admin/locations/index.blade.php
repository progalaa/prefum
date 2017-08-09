@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">الأفرع</h3>
    <p>
        <a href="{{ route('admin.locations.create') }}" class="btn btn-success">إضافة فرع</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض الأفرع</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($locations) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>المدينه بالعربي</th>
                        <th>المدينه بالإنجليزي</th>
                        <th>الدولة بالعربي</th>
                        <th>الدولة بالإنجليزي</th>
                        <th>الشارع بالعربي</th>
                        <th>الشارع بالإنجليزي</th>
                        <th>خطوط الطول</th>
                        <th>دوائر العرض</th>
                        <th>تاريخ الإنشاء</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($locations) > 0)
                        @foreach ($locations as $location)
                            <tr data-entry-id="{{ $location->id }}">
                                <td></td>
                                <td>{{ $location->city_ar }}</td>
                                <td>{{ $location->city_en }}</td>
                                <td>{{ $location->country_ar }}</td>
                                <td>{{ $location->country_en }}</td>
                                <td>{{ $location->street_ar }}</td>
                                <td>{{ $location->street_en }}</td>
                                <td>{{ $location->lat }}</td>
                                <td>{{ $location->lng }}</td>
                                <td>{{ $location->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.locations.edit',[$location->id]) }}" class="btn btn-xs btn-info">تعديل</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.locations.destroy', $location->id])) !!}
                                    {!! Form::submit('مسح', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">لا يوجد بيانات في الجدول </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.locations.mass_destroy') }}';
    </script>
@endsection