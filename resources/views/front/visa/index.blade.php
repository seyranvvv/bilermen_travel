@extends('front.layouts.app')
@section('title')
    @lang('transFront.visas') | @lang('transFront.app-name')
@endsection
@section('keywords')
    @lang('transFront.visas')
@endsection
@section('content')
    <!--Page Header Start-->

    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({!! Request::root() !!}{!! Storage::disk('local')->url('visaBanner/image/' . optional($visaBanner)->getImage()) !!})">
        </div>
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <li><span>/</span></li>
                    <li>@lang('transFront.visas')</li>
                </ul>
                <h2>@lang('transFront.visas')</h2>
            </div>
        </div>
    </section>


    <section class="faq-one">
        <div class="container">
            <div class="section-title text-center">
                <div class="section-sub-title-box">
                    <div class="section-title-shape-1">
                        <img src="assets/images/shapes/section-title-shape-1.png" alt="">
                    </div>
                    <div class="section-title-shape-2">
                        <img src="assets/images/shapes/section-title-shape-2.png" alt="">
                    </div>
                </div>
                <h2 class="section-title__title">@lang('transFront.visas')</h2>
            </div>
            <div class="row">
                @php
                    $index = 0;
                @endphp
                @foreach ($visasChunk as $visas)
                    <div class="col-xl-6 col-lg-6">
                        <div class="faq-one__single">
                            <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-1">
                                @foreach ($visas as $visa)
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4><span>{{ $index += 1 }}</span> {{ $visa->title_tm }}</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>{!! $visa->description_tm !!}</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--FAQ One End-->
@endsection
