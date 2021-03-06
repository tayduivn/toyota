<?php use App\Common\{Constant, ImageCommon}; ?>
<div class="item">
    <div class="article-item">
        <div class="grid mg-left-10">
            <div
                class="grid__item large--one-half medium--one-whole small--one-whole pd-left10">
                <div class="article-img">
                    <a href="{{route('blog.detail',['slug' => $blog->slug, 'id' => $blog->id])}}">
                        <img src="{{ImageCommon::showImage($blog->blog_image)}}"
                            alt="{{$blog->blog_title}}">
                    </a>
                </div>
            </div>
            <div
                class="grid__item large--one-half medium--one-whole small--whole pd-left10">
                <div class="article-info-wrapper">
                    <div class="article-info">
                        <div class="article-date">
                            <span class="article-day">{{$blog->str_day_post_date}}</span>/
                            <span>{{$blog->str_month_post_date}}</span>/
                            <span>{{$blog->str_year_post_date}}</span>
                        </div>
                        <div class="article-title">
                            <a href="{{route('blog.detail',['slug' => $blog->slug, 'id' => $blog->id])}}">
                                {{$blog->blog_title}}
                            </a>
                        </div>
                        {{--<div class="article-author">--}}
                            {{--<svg class="svg-inline--fa fa-edit fa-w-18"--}}
                                 {{--aria-hidden="true" data-prefix="far" data-icon="edit"--}}
                                 {{--role="img" xmlns="http://www.w3.org/2000/svg"--}}
                                 {{--viewBox="0 0 576 512" data-fa-i2svg="">--}}
                                {{--<path fill="currentColor"--}}
                                      {{--d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path>--}}
                            {{--</svg><!-- <i class="far fa-edit"></i> --> Đăng bởi: <span>Suplo Bạc</span>--}}
                        {{--</div>--}}
                        {{--<div class="article-comment">--}}
                            {{--<svg class="svg-inline--fa fa-comments fa-w-18"--}}
                                 {{--aria-hidden="true" data-prefix="far"--}}
                                 {{--data-icon="comments" role="img"--}}
                                 {{--xmlns="http://www.w3.org/2000/svg"--}}
                                 {{--viewBox="0 0 576 512" data-fa-i2svg="">--}}
                                {{--<path fill="currentColor"--}}
                                      {{--d="M574.507 443.86c-5.421 21.261-24.57 36.14-46.511 36.14-32.246 0-66.511-9.99-102.1-29.734-50.64 11.626-109.151 7.877-157.96-13.437 41.144-2.919 80.361-12.339 116.331-28.705 16.322-1.22 32.674-4.32 48.631-9.593C454.404 412.365 490.663 432 527.996 432c-32-17.455-43.219-38.958-46.159-58.502 25.443-18.848 46.159-47.183 46.159-81.135 0-10.495-2.383-21.536-7.041-32.467 7.405-25.93 8.656-50.194 5.185-73.938 32.164 30.461 49.856 69.128 49.856 106.405 0 33.893-12.913 65.047-34.976 91.119 2.653 2.038 5.924 4.176 9.962 6.378 19.261 10.508 28.947 32.739 23.525 54zM240.002 80C117.068 80 48.004 152.877 48.004 210.909c0 38.196 24.859 70.072 55.391 91.276-3.527 21.988-16.991 46.179-55.391 65.815 44.8 0 88.31-22.089 114.119-37.653 25.52 7.906 51.883 11.471 77.879 11.471C362.998 341.818 432 268.976 432 210.909 432 152.882 362.943 80 240.002 80m0-48C390.193 32 480 126.026 480 210.909c0 22.745-6.506 46.394-18.816 68.391-11.878 21.226-28.539 40.294-49.523 56.674-21.593 16.857-46.798 30.045-74.913 39.197-29.855 9.719-62.405 14.646-96.746 14.646-24.449 0-48.34-2.687-71.292-8.004C126.311 404.512 85.785 416 48.004 416c-22.18 0-41.472-15.197-46.665-36.761-5.194-21.563 5.064-43.878 24.811-53.976 7.663-3.918 13.324-7.737 17.519-11.294-7.393-7.829-13.952-16.124-19.634-24.844C8.09 264.655.005 238.339.005 210.909.005 126.259 89.508 32 240.002 32z"></path>--}}
                            {{--</svg><!-- <i class="far fa-comments"></i> --> <span--}}
                                {{--class="fb-comments-count fb_comments_count_zero"--}}
                                {{--data-href="https://suplo-car-accesories.myharavan.com/blogs/news/sieu-xe-nua-trieu-usd-co-nguy-co-roi-banh-ra-duong"--}}
                                {{--fb-xfbml-state="rendered"><span--}}
                                    {{--class="fb_comments_count">0</span></span>--}}
                        {{--</div>--}}
                    </div>
                    <div class="article-desc medium--hide small--hide">
                        {{\App\Common\AppCommon::showTextDot($blog->blog_description,126)}}
                    </div>
                    <a href="{{route('blog.detail',['slug' => $blog->slug, 'id' => $blog->id])}}"
                       class="article-btn">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
