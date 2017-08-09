@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">القائمة الرئيسية</h3>
    <p>
        <a href="{{ route('admin.menus.create') }}" class="btn btn-success">إضافة عنصر للقائمة</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض عناصر القائمة</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($menus) > 0 ? 'datatable' : '' }} dt-select">
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
                    @if (count($menus) > 0)
                        @foreach ($menus as $menu)
                            <tr data-entry-id="{{ $menu->id }}">
                                <td></td>
                                <td>{{ $menu->name_ar }}</td>
                                <td>{{ $menu->name_en }}</td>
                                <td>{{ $menu->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.menus.edit',[$menu->id]) }}" class="btn btn-xs btn-info">تعديل</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.menus.destroy', $menu->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.menus.mass_destroy') }}';
    </script>
@endsection