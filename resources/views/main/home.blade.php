@extends('main.home_master');
@section('content')

@php
    $firstSecThumb = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();

    $first_section  = DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(8)->get();
@endphp



<!-- 1st-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-md-10 col-sm-10">
                        <div class="lead-news">
 <div class="service-img"><a href="#"><img src="{{asset($firstSecThumb->image)}}" width="800px" alt="Notebook"></a></div>
                            <div class="content">
     <h4 class="lead-heading-01"><a href="#">
        @if (session()->get('lang')=='english')
            {{$firstSecThumb->title_en}}
            @else
            {{$firstSecThumb->title_hin}}
        @endif
    </a> </h4>
                            </div>
                        </div>
                    </div>

                </div>
                    <div class="row">
                        @foreach ($first_section as $row)
                        <div class="col-md-3 col-sm-3">
                            <div class="top-news">
                                <a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">
                                @if (session()->get('lang')=='english')
                                    {{$row->title_en}}
                                @else
                                    {{$row->title_hin}}
                                @endif
                                </a> </h4>
                            </div>
                        </div>
                        @endforeach


                        </div>

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}assets/img/" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                <!-- news-start -->


                @php

                    $category = DB::table('categories')->first();

                    $generalThumb = DB::table('posts')->where('category_id', $category->id)->where('big_thumbnail',1)->orderBy('id','desc')->first();

                    $generalThumbSmall = DB::table('posts')->where('category_id', $category->id)->where('big_thumbnail',NULL)->limit(2)->get();
                @endphp

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title">
                                <a href="#">
                                    @if (session()->get('lang')=='english')
                                    {{$category->category_en}}
                                    @else
                                    {{$category->category_hin}}
                                    @endif
                                     <span>
                                        @if (session()->get('lang')=='english')
                                        More
                                        @else
                                        अधिक
                                        @endif
                                         <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                            <div class="row">


                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{asset($generalThumb->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="#">
                                        @if (session()->get('lang')=='english')
                                            {{Str::limit($generalThumb->title_en,40)}}
                                        @else
                                            {{Str::limit($generalThumb->title_hin,40)}}
                                        @endif
                                        </a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach ($generalThumbSmall as $row)
                                    <div class="image-title">
                                        <a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">
                                            @if (session()->get('lang')=='english')
                                            {{Str::limit($row->title_en,40)}}
                                            @else
                                            {{Str::limit($row->title_hin,40)}}
                                            @endif
                                        </a> </h4>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                    @php

                    $scategory = DB::table('categories')->skip(1)->first();

                    $sgeneralThumb = DB::table('posts')->where('category_id', $scategory->id)->where('big_thumbnail',1)->orderBy('id','desc')->first();

                    $sgeneralThumbSmall = DB::table('posts')->where('category_id', $scategory->id)->where('big_thumbnail',NULL)->limit(2)->get();
                    @endphp

                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title"><a href="#">
                                @if (session()->get('lang')=='english')
                                    {{$scategory->category_en}}
                                    @else
                                    {{$scategory->category_hin}}
                                    @endif
                                <span>
                                    @if (session()->get('lang')=='english')
                                        More
                                        @else
                                        अधिक
                                        @endif
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{asset($sgeneralThumb->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="#">
                                            @if (session()->get('lang')=='english')
                                            {{Str::limit($sgeneralThumb->title_en,40)}}
                                        @else
                                            {{Str::limit($sgeneralThumb->title_hin,40)}}
                                        @endif
                                        </a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach ($sgeneralThumbSmall as $item)
                                    <div class="image-title">
                                        <a href="#"><img src="{{asset($item->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">
                                            @if (session()->get('lang')=='english')
                                            {{Str::limit($item->title_en,40)}}
                                            @else
                                            {{Str::limit($item->title_hin,40)}}
                                            @endif
                                        </a> </h4>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->



                <!-- youtube-live-start -->
                @php
                    $livetv = DB::table('livetvs')->first();
                @endphp

                @if ($livetv->status == 1)
<div class="cetagory-title-03">Live TV</div>
                <div class="photo">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">

                        {!! $livetv->embed_code !!}
                    </div>
                </div>
                @else

                @endif
                <!-- /.youtube-live-close -->






                <!-- facebook-page-start -->
                <div class="cetagory-title-03">Facebook </div>
                <div class="fb-root">
                    facebook page here
                </div><!-- /.facebook-page-close -->

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->
            </div>
        </div>
    </div>
</section><!-- /.1st-news-section-close -->

<!-- 2nd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">International <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Politics <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******* -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Biz-Econ<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- add-start -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
            </div>
        </div><!-- /.add-close -->

    </div>
</section><!-- /.2nd-news-section-close -->

<!-- 3rd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>

                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                </div>
                <!-- ******* -->
                <br />
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="bg-gray">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->


            </div>
            <div class="col-md-3 col-sm-3">
                <div class="tab-header">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">Latest</a></li>
                        <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">Popular</a></li>
                        <li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">Popular1</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab23">
                            <div class="news-titletab">
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                    $prayer = DB::table('prayers')->first();
                ?>
                <!-- Namaj Times -->
                <div class="cetagory-title-03">
                    @if (session()->get('lang')=='english')
                        Prayer Time
                    @else
                        प्रार्थना का समय
                    @endif
                </div>


                <table class="table">
                    <tr>
                        <th>
                            @if (session()->get('lang')=='english')
                                Fajor :
                            @else
                                फजोर :
                            @endif
                        </th>
                        <td>{{$prayer->fajor}}</td>
                    </tr>
                    <tr>
                        <th>
                            @if (session()->get('lang')=='english')
                                Johor :
                            @else
                                जोहोर :
                            @endif
                        </th>
                        <td>{{$prayer->johor}}</td>
                    </tr>
                    <tr>
                        <th>
                            @if (session()->get('lang')=='english')
                                Asor :
                            @else
                                असोर :
                            @endif
                        </th>
                        <td>{{$prayer->asor}}</td>
                    </tr>
                    <tr>
                        <th>
                            @if (session()->get('lang')=='english')
                                Magrib :
                            @else
                                मगरिब :
                            @endif
                        </th>
                        <td>{{$prayer->magrib}}</td>
                    </tr>
                    <tr>
                        <th>
                            @if (session()->get('lang')=='english')
                                Esha :
                            @else
                                ईशा :
                            @endif
                        </th>
                        <td>{{$prayer->esha}}</td>
                    </tr>
                    <tr>
                        <th>
                            @if (session()->get('lang')=='english')
                                Jummah :
                            @else
                                जुम्मा :
                            @endif
                        </th>
                        <td>{{$prayer->jummah}}</td>
                    </tr>
                </table>

                <!-- Namaj Times -->




                <div class="cetagory-title-03">Old News  </div>
                <form action="" method="post">
                    <div class="old-news-date">
                       <input type="text" name="from" placeholder="From Date" required="">
                       <input type="text" name="" placeholder="To Date">
                    </div>
                    <div class="old-date-button">
                        <input type="submit" value="search ">
                    </div>
               </form>
               <!-- news -->
               <br><br><br><br><br>

               <?php
                    $web = DB::table('websites')->get();
               ?>


               <div class="cetagory-title-04">
                    @if (session()->get('lang')=='english')
                        Important Website
                    @else
                        महत्वपूर्ण वेबसाइट
                    @endif
                </div>
               <div class="">
                   @foreach ($web as $row)
                   <div class="news-title-02">
                    <h4 class="heading-03"><a target="_blank" href="{{$row->website_address}}"><i class="fa fa-check" aria-hidden="true"></i> {{$row->website_name}}  </a> </h4>
                    </div>
                   @endforeach
               </div>

            </div>
        </div>
    </div>
</section><!-- /.3rd-news-section-close -->









<!-- gallery-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="gallery_cetagory-title"> Photo Gallery </div>

                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="photo_screen">
                            <div class="myPhotos" style="width:100%">
                                  <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="photo_list_bg">

                            <div class="photo_img photo_border active">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
                                <div class="heading-03">
                                    Casting of Israeli actress as Cleopatra sparks anger
                                </div>
                            </div>

                            <div class="photo_img photo_border">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
                                <div class="heading-03">
                                   Casting of Israeli actress as Cleopatra sparks anger
                                </div>
                            </div>

                            <div class="photo_img photo_border">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
                                <div class="heading-03">
                                   Casting of Israeli actress as Cleopatra sparks anger
                                </div>
                            </div>

                            <div class="photo_img photo_border">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
                                <div class="heading-03">
                                   Casting of Israeli actress as Cleopatra sparks anger
                                </div>
                            </div>

                            <div class="photo_img photo_border">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
                                <div class="heading-03">
                                   Casting of Israeli actress as Cleopatra sparks anger
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--=======================================
                Video Gallery clickable jquary  start
            ========================================-->

                        <script>
                                var slideIndex = 1;
                                showDivs(slideIndex);

                                function plusDivs(n) {
                                  showDivs(slideIndex += n);
                                }

                                function currentDiv(n) {
                                  showDivs(slideIndex = n);
                                }

                                function showDivs(n) {
                                  var i;
                                  var x = document.getElementsByClassName("myPhotos");
                                  var dots = document.getElementsByClassName("demo");
                                  if (n > x.length) {slideIndex = 1}
                                  if (n < 1) {slideIndex = x.length}
                                  for (i = 0; i < x.length; i++) {
                                     x[i].style.display = "none";
                                  }
                                  for (i = 0; i < dots.length; i++) {
                                     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                  }
                                  x[slideIndex-1].style.display = "block";
                                  dots[slideIndex-1].className += " w3-opacity-off";
                                }
                            </script>

            <!--=======================================
                Video Gallery clickable  jquary  close
            =========================================-->

            </div>
            <div class="col-md-4 col-sm-5">
                <div class="gallery_cetagory-title"> photo Gallery </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="video_screen">
                            <div class="myVideos" style="width:100%">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                <iframe width="853" height="480" src="https://www.youtube.com/embed/AWM8164ksVY?list=RDAWM8164ksVY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="gallery_sec owl-carousel">

                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                                <div class="heading-03">
                                    <div class="content_padding">
                                       Kumar Sanu tests positive for coronavirus
                                    </div>
                                </div>
                            </div>

                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                                <div class="heading-03">
                                    <div class="content_padding">
                                   Kumar Sanu tests positive for coronavirus
                                    </div>
                                </div>
                            </div>

                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                                <div class="heading-03">
                                    <div class="content_padding">
                                      Kumar Sanu tests positive for coronavirus
                                    </div>
                                </div>
                            </div>

                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                                <div class="heading-03">
                                    <div class="content_padding">
                                       Kumar Sanu tests positive for coronavirus
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <script>
                    var slideIndex = 1;
                    showDivss(slideIndex);

                    function plusDivs(n) {
                      showDivss(slideIndex += n);
                    }

                    function currentDivs(n) {
                      showDivss(slideIndex = n);
                    }

                    function showDivss(n) {
                      var i;
                      var x = document.getElementsByClassName("myVideos");
                      var dots = document.getElementsByClassName("demo");
                      if (n > x.length) {slideIndex = 1}
                      if (n < 1) {slideIndex = x.length}
                      for (i = 0; i < x.length; i++) {
                         x[i].style.display = "none";
                      }
                      for (i = 0; i < dots.length; i++) {
                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                      }
                      x[slideIndex-1].style.display = "block";
                      dots[slideIndex-1].className += " w3-opacity-off";
                    }
                </script>

            </div>
        </div>
    </div>
</section><!-- /.gallery-section-close -->
@endsection
