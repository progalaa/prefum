@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">أعضاء القائمة البريدية</h3>


    <div class="panel panel-default">
        <div class="panel-heading">عرض الأعضاء</div>

        <div class="panel-body table-responsive">
            <table dir="rtl"
                   class="table table-bordered table-striped {{ count($emails) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>
                    <th>الكود</th>
                    <th>البريد الإليكتروني</th>
                    <th>تاريخ الإنشاء</th>
                    <th>&nbsp;</th>

                </tr>
                </thead>

                <tbody>
                @if (count($emails) > 0)
                    @foreach ($emails as $email)
                        <tr data-entry-id="{{ $email->id }}">
                            <td></td>
                            <td>{{ $email->id }}</td>
                            <td>{{ $email->email }}</td>
                            <td>{{ $email->created_at }}</td>
                            <td>
                                <button data-toggle="modal" data-target="#myModal-<?php echo $email->id;?>"
                                        data-email="{{$email->email }}}}" data-target="#myModal"
                                        class="btn btn-xs btn-success">عرض
                                </button>

                                {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                    'route' => ['admin.emails.destroy', $email->id])) !!}
                                {!! Form::submit('مسح', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal-<?php echo $email->id;?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">عرض بيانات البريد</h4>
                                        </div>
                                        <div class="modal-body">
                                            <b>البريد الالكتروني :</b><p>{{$email->email }}</p>
                                        </div>
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
                        <td colspan="3">لا يوجد بيانات في الجدول</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.emails.mass_destroy') }}';
    </script>
@endsection