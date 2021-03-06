@extends('guest.layouts.master')

@section('head.og.image')@if(count($products) > 0){{\App\Common\ImageCommon::showImage($products[0]->product_image)}}@endif @endsection

@section('head.title')
    Sản Phẩm - {{$appInfo->app_name}}
@endsection

@section('body.content')
    <main class="main-content" role="main">

        <section id="collection-wrapper">
            <div class="wrapper">
                <div class="inner">
                    <div class="grid">
                        <div class="grid__item large--three-quarters medium--one-whole small--one-whole float-right">
                            <div class="collection-content-wrapper">
                                <div class="collection-head">
                                    <div class="grid">
                                        <div class="grid__item large--seven-twelfths medium--one-half small--one-whole">
                                            <div class="collection-title">
                                                <h1>Tất cả sản phẩm</h1>
                                            </div>
                                        </div>
                                        <div class="grid__item large--five-twelfths medium--one-half small--one-whole">
                                            <div
                                                class="collection-sorting-wrapper large--text-right medium--text-right">
                                                <!-- /snippets/collection-sorting.liquid -->
                                                <div class="form-horizontal">
                                                    <label for="SortBy">Sắp xếp</label>
                                                    <select name="SortBy" id="SortBy">
                                                        <option value="manual">Tùy chọn</option>
                                                        <option value="created-descending" >Mới nhất</option>
                                                        <option value="created-ascending" >Cũ nhất</option>
                                                        <option value="price-ascending" >Giá: Tăng dần</option>
                                                        <option value="price-descending" >Giá: Giảm dần</option>
                                                        <option value="title-ascending" >Tên: A-Z</option>
                                                        <option value="title-descending" >Tên: Z-A</option>
                                                    </select>
                                                </div>


                                                <script>
                                                    /*============================================================================
                                                        Inline JS because collection liquid object is only available
                                                        on collection pages and not external JS files
                                                      ==============================================================================*/
                                                    Haravan.queryParams = {};
                                                    if (location.search.length) {
                                                        for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
                                                            aKeyValue = aCouples[i].split('=');
                                                            if (aKeyValue.length > 1) {
                                                                Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
                                                            }
                                                        }
                                                    }

                                                    $(function () {
                                                        $('#SortBy')
                                                            .val('created-descending')
                                                            .bind('change', function () {
                                                                    Haravan.queryParams.sort_by = jQuery(this).val();
                                                                    location.search = jQuery.param(Haravan.queryParams);
                                                                }
                                                            );
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collection-body">

                                    <div class="grid-uniform product-list md-mg-left-5">
                                        @foreach($products as $product)
                                            <div class="grid__item large--one-third medium--one-third small--one-half md-pd-left5">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="{{route('product_detail',['slug' => $product->slug, 'id' => $product->id])}}">
                                                            <img id="{{$product->id}}"
                                                                 src="{{\App\Common\ImageCommon::showImage($product->product_image)}}"
                                                                 alt="{{$product->product_name}}">
                                                            <img id="{{$product->id}}"
                                                                 src="{{\App\Common\ImageCommon::showImage($product->product_image)}}"
                                                                 alt="{{$product->product_name}}">
                                                        </a>
                                                        {{--<div class="product-actions medium--hide small--hide">--}}
                                                            {{--<div>--}}
                                                                {{--<button type="button"--}}
                                                                        {{--class="btnQuickView quick-view medium--hide small--hide"--}}
                                                                        {{--data-handle="/products/suplo-smart-gravity-holder-cute-mount-10w-fast-wireless-car-charger-bracket-car-accessories-8">--}}
                                                                {{--<span><svg class="svg-inline--fa fa-search-plus fa-w-16"--}}
                                                                           {{--aria-hidden="true" data-prefix="fa"--}}
                                                                           {{--data-icon="search-plus" role="img"--}}
                                                                           {{--xmlns="http://www.w3.org/2000/svg"--}}
                                                                           {{--viewBox="0 0 512 512" data-fa-i2svg=""><path--}}
                                                                            {{--fill="currentColor"--}}
                                                                            {{--d="M304 192v32c0 6.6-5.4 12-12 12h-56v56c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-56h-56c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h56v-56c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v56h56c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z"></path></svg>--}}
                                                                    {{--<!-- <i class="fa fa-search-plus" aria-hidden="true"></i> --></span>--}}
                                                                {{--</button>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}

                                                    </div>
                                                    <div class="product-item-info">
                                                        <div class="product-title">
                                                            <a href="{{route('product_detail',['slug' => $product->slug, 'id' => $product->id])}}">
                                                                {{$product->product_name}}
                                                            </a>
                                                        </div>
                                                        <div class="product-desc">
                                                            {{$product->product_title}}
                                                        </div>
                                                        <div class="product-price clearfix text-center">
                                                            <span class="current-price">{{\App\Common\AppCommon::formatMoney($product->product_price)}} VNĐ</span>
                                                        </div>
                                                        <div class="product-description clearfix">
                                                            <span style="display: flex;">• Chỗ ngồi : {{$product->product_number_of_seat}}</span>
                                                            <span style="display: flex;">• Kiểu dáng : {{$product->product_design}}</span>
                                                            <span style="display: flex;">• Nhiên liệu : {{$product->product_fuel}}</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($products->total() > 20)
                                        <div class="">
                                            {{$products->links('both.common.view_pageging')}}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="grid__item large--one-quarter medium--one-whole small--one-whole">
                            <div class="collection-sidebar-wrapper">
                                <div class="grid-uniform mg-left-10">
                                    @include('guest.collection.partials.__search_product',['searchInfo' => $searchInfo])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
