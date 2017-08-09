@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">مستخدمي الموقع</h3>
    <p>
        <a href="{{ route('admin.site_users.create') }}" class="btn btn-success">إضافة مستخدم</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض المستخدمين</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($site_users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>الإسم بالكامل</th>
                        <th>البريد الإليكتروني</th>
                        <th>التليفون</th>
                        <th>العنوان</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($site_users) > 0)
                        @foreach ($site_users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td></td>
                                <td>{{ $user->prefix_ar." . ".$user->first_name." ".$user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telephone }}</td>
                                <td>{{ $user->street_adress." , ".$user->city." , ".$user->country }}</td>
                                <td>
                                    <a href="{{ route('admin.site_users.edit',[$user->id]) }}" class="btn btn-xs btn-info">تعديل</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.site_users.destroy', $user->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.site_users.mass_destroy') }}';
    </script>
@endsection