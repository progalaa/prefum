@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">العلامات التجارية</h3>
    <p>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-success">إضافة علامة تجارية</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض العلامات التجارية</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($brands) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>الإسم بالعربي</th>
                        <th>الإسم بالإنجليزي</th>
                        <th>تاريخ الإنشاء</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($brands) > 0)
                        @foreach ($brands as $brand)
                            <tr data-entry-id="{{ $brand->id }}">
                                <td></td>
                                <td>{{ $brand->name_ar }}</td>
                                <td>{{ $brand->name_en }}</td>
                                <td>{{ $brand->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.brands.edit',[$brand->id]) }}" class="btn btn-xs btn-info">تعديل</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.brands.destroy', $brand->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.brands.mass_destroy') }}';
    </script>
@endsection