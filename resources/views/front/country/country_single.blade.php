@extends('front.layouts.app')
@section('title')
{!! strip_tags(html_entity_decode($country->getName())) !!} | @lang('transFront.app-name')
    
@endsection
@section('keywords')
    @lang('transFront.tours')
@endsection
@section('content')
    <!--Page Header Start-->

    <section class="page-header {{ $country->image_banner ? '' : 'py-3' }}">
        @if ($country->image_banner)
            <div class="page-header-bg"
                style="background-image: url({{ Storage::disk('local')->url('image_banner/image/' . $country->image_banner) }}">
            </div>
        @endif
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <!-- <li><span>/</span></li>
                    <li>@lang('transFront.tours')</li> -->
                </ul>
                <h2>{{ $country->getTitle() }}</h2>
            </div>
        </div>
    </section>


   <!--Why Choose Two Start-->
   <section class="why-choose-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-two__left">
                     
                      
                        <p class="why-choose-two__text"> {!! html_entity_decode($country->getName()) !!}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-two__right benefits-two__img">
                        <img src="{{ Storage::disk('local')->url($country->image_index) }}" alt="{{ $country->image_en }}">
                    </div>
                    
                </div>
                <div class="col-xl-6 col-lg-6">

                </div>

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
                    $index = 0
                @endphp
                @foreach ($ticketsChunk as $tickets)
                    <div class="col-xl-6 col-lg-6">
                        <div class="faq-one__single">
                            <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-1">
                                @foreach ($tickets as $ticket)
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4><span>{{$index+=1}}</span> {{$ticket->title_tm}}</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>{!! $ticket->description_tm  !!}</p>
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





@endsection
