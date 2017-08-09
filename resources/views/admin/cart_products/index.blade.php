@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">سجل الطلبات</h3>
    <p>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض جميع الطلبات</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($products) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>رقم الطلب</th>
                        <th>إسم المنتج</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>صورة المنتج</th>
                        <th>تاريخ الطلب</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr data-entry-id="{{ $product->id }}">
                                <td></td>
                                <td><center>{{ $product->id }}</center></td>
                                <td><center>{{ $product->product->name_ar }}</center></td>
                                <td><center>{{ $product->product->price }}</center></td>
                                <td><center>{{ $product->qty }}</center></td>
                                <td><center><img src="{{ URL::to('/public/images/'.$product->product->image) }}" width="100px" height="100px"></center></td>
                                <td><center>{{ $product->created_at }}</center></td>
                                <td>
                                    <center>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                            'route' => ['admin.cart_products.destroy', $product->id])) !!}
                                        {!! Form::submit('الغاء', array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    </center>
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