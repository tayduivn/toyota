<?php use App\Common\ImageCommon; use App\Common\AppCommon;?>
@extends('admin.layouts.master')

@section('head.title','Danh Sách Sản Phẩm')

@section('head.css')
    <link href="{{asset('css/admin/product.css')}}" rel="stylesheet">
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.product') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> Danh Sách Sản Phẩm
                            <div class="card-header-actions">
                                <div class="float-left" style="margin-top: -4px;margin-right: 5px;">
                                    @include('admin.common.__select_product_type',
                                    ['isAllValue' => true,
                                    'selectName' => 'product_type_id',
                                    'defaultValue' => $product_type_id])
                                </div>
                                <a class="btn btn-sm btn-primary" href="{{route('admin.product.create')}}">
                                    Tạo mới
                                </a>
                                <a class="btn btn-sm btn-primary" href="{{route('admin.product.load_info')}}">
                                    Lấy Sản Phẩm
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc app-col-stt">
                                                    STT
                                                </th>
                                                <th class="sorting app-col-img">
                                                    Hình Ảnh
                                                </th>
                                                <th class="sorting app-col-name" >
                                                    Tên Sản Phẩm
                                                </th>
                                                <th class="sorting app-col-code" >
                                                    Tiêu Đề Sản Phẩm
                                                </th>
                                                <th class="sorting app-col-type" >
                                                    Loại Sản Phẩm
                                                </th>
                                                <th class="sorting app-col-price" >
                                                    Giá Bán
                                                </th>
                                                <th class="sorting app-col-status" >
                                                    Tình Trạng
                                                </th>
                                                <th class="sorting app-col-update" >
                                                    Ngày Cập Nhật
                                                </th>
                                                <th class="sorting app-col-action">
                                                    Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $key => $product)
                                                <tr role="row" class="odd">
                                                    <td class="text-right">
                                                        {{$key + 1}}
                                                    </td>
                                                    <td >
                                                        <img src="{{ImageCommon::showImage($product->product_image)}}" width="100"/>
                                                    </td>
                                                    <td class="">
                                                        {{$product->product_name}}
                                                    </td>
                                                    <td class="">
                                                        {{$product->product_title}}
                                                    </td>
                                                    <td class="">
                                                        {{$product->product_type_name}}
                                                    </td>
                                                    <td class="text-right">
                                                        {{AppCommon::formatMoney($product->product_price)}} VNĐ
                                                    </td>
                                                    <td class="">
                                                        <span class="badge {{$product->public_class}}">{{$product->public_name}}</span>
                                                    </td>
                                                    <td class="">
                                                        {{\App\Common\DateUtils::dateFormat($product->updated_at)}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{--<a class="btn btn-success" href="#">--}}
                                                            {{--<i class="fa fa-search-plus"></i>--}}
                                                        {{--</a>--}}
                                                        <a class="btn btn-info" href="{{route('admin.product.update',['id' => $product->id])}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a data-toggle="modal" class="btn btn-danger anchorClick"
                                                           data-url="{{route('admin.product.delete',['id' => $product->id]) }}"
                                                           data-name="{{$product->product_name}}" href="#deleteModal">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pull-right">
                                            {{ $products->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body.js')
    <script>
        var urlCurrent = "{{route('admin.product.index')}}";
        $(document).ready(function () {
            $('select[name=product_type_id]').on('change',function () {
                var value = $(this).val();
                window.location = urlCurrent + "?product_type_id=" + value;
            });
        });
    </script>
@endsection
