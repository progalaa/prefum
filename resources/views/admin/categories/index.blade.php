@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">الأقسام الرئيسية</h3>
    <p>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">إضافة قسم رئيسي</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض الأقسام الرئيسية</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($categories) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>الإسم بالعربي</th>
                        <th>الإسم بالإنجليزي</th>
                        <th>القائمة الرئيسية</th>
                        <th>تاريخ الإنشاء</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <tr data-entry-id="{{ $category->id }}">
                                <td></td>
                                <td>{{ $category->name_ar }}</td>
                                <td>{{ $category->name_en }}</td>
                                <td>
                                    {{ $category->menu->name_ar }}
                                </td>
                                <td>{{ $category->created_at }}</td>

                                <td>
                                    <a href="{{ route('admin.categories.edit',[$category->id]) }}" class="btn btn-xs btn-info">تعديل</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.categories.destroy', $category->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.categories.mass_destroy') }}';
    </script>
@endsection