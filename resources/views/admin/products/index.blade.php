@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">المنتجات</h3>
    <p>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">إضافة منتج</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">عرض المنتجات</div>

        <div class="panel-body table-responsive">
            <table dir="rtl" class="table table-bordered table-striped {{ count($products) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr >
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>الإسم عربي</th>
                        <th>الإسم إنجليزي</th>
                        <th>الصورة</th>
                        <th> العنوان عربي</th>
                        <th>العنوان انجليزي</th>
                        <th>الوصف عربي</th>
                        <th>السعر</th>
                        <th>القائمة</th>
                        <th>القسم الرئيسي</th>
                        <th>القسم الفرعي</th>
                        <th>العلامة التجارية</th>
                        <th>الحالة</th>

                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr data-entry-id="{{ $product->id }}">
                                <td></td>
                                <td>{{ $product->name_ar}}</td>
                                <td>{{ $product->name_en }}</td>
                                <td><img src="{{ URL::to('/public/images/'.$product->image) }}" width="100px" height="100px"></td>
                                <td>{{ $product->title_ar }}</td>
                                <td>{{ $product->title_en}}</td>
                                <td><?php echo substr($product->description_ar, 0, 300); ?></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->menu->name_ar ." - ".$product->menu->name_en }}</td>
                                <td>{{ $product->category->name_ar ." - ".$product->category->name_en }}</td>
                                <td>{{ $product->subcat->name_ar ." - ".$product->subcat->name_en }}</td>
                                <td>{{ $product->brand->name_ar." - ".$product->brand->name_en }}</td>
                                <td>
                                    <input type="hidden" id="url" value="{{ route('admin.products.ajax') }}">
                                    @if($product->status == 1)
                                    <label class="switch">
                                        <input type="checkbox" data-status="{{$product->status}}" data-product="{{$product->id}}" checked>
                                        <span class="slider round"></span>
                                    </label>
                                    @else
                                    <label class="switch">
                                        <input type="checkbox" data-status="{{$product->status}}" data-product="{{$product->id}}">
                                        <span class="slider round"></span>
                                    </label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.products.edit',[$product->id]) }}" class="btn btn-xs btn-info">تعديل</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.products.destroy', $product->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.products.mass_destroy') }}';
    </script>
@endsection