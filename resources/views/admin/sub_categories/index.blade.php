@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">الأقسام الفرعية</h3>
    <p>
        <a href="{{ route('admin.sub_categories.create') }}" class="btn btn-success">إضافة قسم فرعي</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض الأقسام الفرعية</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($sub_categories) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>الإسم بالعربي</th>
                        <th>الإسم بالإنجليزي</th>
                        <th>القسم الرئيسي</th>
                        <th>تاريخ الإنشاء</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($sub_categories) > 0)
                        @foreach ($sub_categories as $subCat)
                            <tr data-entry-id="{{ $subCat->id }}">
                                <td></td>
                                <td>{{ $subCat->name_ar }}</td>
                                <td>{{ $subCat->name_en }}</td>
                                <td>
                                    {{ $subCat->category->name_ar." -- ".$subCat->category->name_en}}
                                </td>
                                <td>{{ $subCat->created_at }}</td>

                                <td>
                                    <a href="{{ route('admin.sub_categories.edit',[$subCat->id]) }}" class="btn btn-xs btn-info">تعديل</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.sub_categories.destroy', $subCat->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.sub_categories.mass_destroy') }}';
    </script>
@endsection