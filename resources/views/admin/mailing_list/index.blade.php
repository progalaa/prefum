@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">القائمة البريدية</h3>


    <div class="panel panel-default">
        <div class="panel-heading">عرض القائمة</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($lists) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>الكود</th>
                        <th>الاسم</th>
                        <th>البريد الالكتروني</th>
                        <th>التليفون</th>
                        <th>نص الرسالة</th>
                        <th>تاريخ الإنشاء</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($lists) > 0)
                        @foreach ($lists as $list)
                            <tr data-entry-id="{{ $list->id }}">
                                <td></td>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->email }}</td>
                                <td>{{ $list->phone }}</td>
                                <td>{{ $list->message }}</td>
                                <td>{{ $list->created_at }}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#myModal-<?php echo $list->id;?>" data-email="{{$list->email }}}}" data-target="#myModal"
                                            class="btn btn-xs btn-success">عرض
                                    </button>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.mailing_list.destroy', $list->id])) !!}
                                    {!! Form::submit('مسح', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td> <!-- Modal -->
                                <div class="modal fade" id="myModal-<?php echo $list->id;?>" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #1d75b3;color: white;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">عرض بيانات البريد</h4>
                                            </div>
                                            <div class="modal-body">
                                                <b>الاسم :</b><p>{{$list->name }}</p>
                                            </div>
                                            <hr/>
                                            <div class="modal-body">
                                                <b>البريد الالكتروني :</b><p>{{$list->email }}</p>
                                            </div>
                                            <hr/>
                                            <div class="modal-body">
                                                <b>التليفون :</b><p>{{$list->phone }}</p>
                                            </div>
                                            <hr/>
                                            <div class="modal-body">
                                                <b>نص الرسالة :</b><p>{{$list->message }}</p>
                                            </div>
                                            <hr/>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.mailing_list.mass_destroy') }}';
    </script>
@endsection