@extends('front.layouts.app')
@section('title')
    @lang('transFront.visas') | @lang('transFront.app-name')
@endsection
@section('keywords')
    @lang('transFront.visas')
@endsection
@section('content')
    <style>
        .comment-form__input-box input,
        textarea {
            border: 1px var(--insur-primary) solid !important;
        }
    </style>
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


    <section class="faq-one mt-4">
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

    <!--Contact Page Start-->
    <section class="">
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
                <h2 class="section-title__title">@lang('transFront.contact')</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page__left">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">@lang('transFront.contact-us')</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                        alt="">
                                </div>
                            </div>
                            {{-- <h2 class="section-title__title">{{ $contactText->getName() }}</h2> --}}
                        </div>
                        <div class="mt-3 contact-page__call-email">
                            <div class="contact-page__call-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-page__call-email-content">
                                <h4>
                                    <a href="tel:{{ $contact->phone }}"
                                        class="pt-3 contact-page__call-number">{{ $contact->phone }}</a>

                                </h4>
                            </div>
                        </div>
                        <div class="mt-4 contact-page__call-email">
                            <div class="contact-page__call-icon">
                                <i class="fas fa-mail-bulk"></i>
                            </div>
                            <div class="contact-page__call-email-content">
                                <h4>
                                    <a href="mailto:{{ $contact->email }}"
                                        class=" pt-3 contact-page__email">{{ $contact->email }}</a>
                                </h4>
                            </div>
                        </div>
                        <div class="mt-4 contact-page__call-email">
                            <div class="contact-page__call-icon">
                                <i class="fas fa-map-marker"></i>
                            </div>
                            <div class="contact-page__call-email-content">
                                <h4>
                                    <a href="#" class=" pt-3 contact-page__email">
                                        {!! html_entity_decode($contact->getName()) !!}
                                    </a>
                                </h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-page__right">
                        <div class="contact-page__form">
                            <form action="{{ route('front.senderEmail') }}" method="POST"
                                class="comment-one__form contact-form-validated">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" required placeholder="@lang('transFront.full-name')" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" required placeholder="@lang('transFront.email')" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" required placeholder="@lang('transFront.phone')" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" required placeholder="@lang('transFront.mowzuk')" name="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="message" required placeholder="@lang('transFront.message')"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="js-input-group" style=""
                                                    for="mathgroup">{!! captcha_img('math') !!}</label>
                                            </div>

                                            <div class="col-lg-6 comment-form__input-box">
                                                <input id="captcha" type="text" class=" "
                                                    placeholder="@lang('transFront.captcha')" name="captcha" required>

                                            </div>
                                        </div>


                                        <div class="comment-form__btn-box mb-3">
                                            <button type="submit"
                                                class="thm-btn comment-form__btn">@lang('transFront.submit')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="row">
                    @foreach ($districts as $district)
                        <div class="col-xl-4 col-lg-4 py-5">
                            <div class="contact-page__left">
                                <div class="section-title text-left">
                                    <div class="section-sub-title-box">
                                        <p class="section-sub-title">{{ $district->getName() }}</p>
                                        <div class="section-title-shape-1">
                                            <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                                alt="">
                                        </div>
                                        <div class="section-title-shape-2">
                                            <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                                alt="">
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-3 contact-page__call-email">
                                    <div class="contact-page__call-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="contact-page__call-email-content">
                                        <h4>
                                            <a href="tel:{{ $district->phone }}"
                                                class="pt-3 contact-page__call-number">{{ $district->phone }}</a>

                                        </h4>
                                    </div>

                                </div>

                                <p class="contact-page__location-text">{!! html_entity_decode($district->getAddress()) !!}</p>
                            </div>
                        </div>
                    @endforeach

                </div> --}}
        </div>
    </section>
@endsection
