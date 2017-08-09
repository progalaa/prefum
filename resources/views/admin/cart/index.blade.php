@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">الطلبات</h3>
    <p>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض جميع الطلبات</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($carts) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>الإسم بالكامل</th>
                        <th>رقم التليفون</th>
                        <th>إجمالي الفاتورة</th>
                        <th>عدد المنتجات</th>
                        <th>حالة الطلب</th>
                        <th>تاريخ الطلب</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($carts) > 0)
                        @foreach ($carts as $cart)
                            <tr data-entry-id="{{ $cart->id }}">
                                <td></td>
                                <td>{{ $cart->user->prefix_ar." . ".$cart->user->first_name." ".$cart->user->last_name }}</td>
                                <td>{{ $cart->user->telephone}}</td>
                                <td>{{ $cart->total_price }}</td>
                                <td>{{ $cart->cartProducts->count() }}</td>
                                <td><?php echo $state[$cart->state];?></td>
                                <td>{{ $cart->order_date }}</td>
                                <td>
                                    <a href="{{ route('admin.cart.show',[$cart->id]) }}" class="btn btn-xs btn-success">التفاصيل</a>
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