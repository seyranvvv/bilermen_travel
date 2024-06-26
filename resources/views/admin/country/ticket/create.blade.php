@extends('admin.layouts.app')
@section('content')
    <link href="{{ asset('admin/css/summernote/summernote-lite.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/js/summernote-lite.js') }}"></script>
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.country.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transFront.tours')
            </a>
            <span class="text-gray-500">/</span>
            <a href="{{ route('admin.country.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transFront.tour_itinerary')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.create')
        </div>
    </div>
    <div class="my-4">

        <form action="{{ route ('admin.country.ticket.store', $country->id) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group row">
                <label for="title_tm" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="title_tm" type="text"
                           class="form-control{{ $errors->has('title_tm') ? ' is-invalid' : '' }}" name="title_tm"
                           required    >
                    @if ($errors->has('title_tm'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_tm') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="title_ru" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="RUS" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger"></span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="title_ru" type="text"
                           class="form-control{{ $errors->has('title_ru') ? ' is-invalid' : '' }}" name="title_ru"
                           >
                    @if ($errors->has('title_ru'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_ru') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="title_en" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="ENG" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger"></span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="title_en" type="text"
                           class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}" name="title_en"
                            >
                    @if ($errors->has('title_en'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_en') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="description_tm" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.description')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="description_tm"
                              class="form-control{{ $errors->has('description_tm') ? ' is-invalid' : '' }} summernote"
                              name="description_tm" rows="3"></textarea>
                    @if ($errors->has('description_tm'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description_tm') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="description_ru" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.description')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="description_ru"
                              class="form-control{{ $errors->has('description_ru') ? ' is-invalid' : '' }} summernote"
                              name="description_ru" rows="3"></textarea>
                    @if ($errors->has('description_ru'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description_ru') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="description_en" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.description')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="description_en"
                              class="form-control{{ $errors->has('description_en') ? ' is-invalid' : '' }} summernote"
                              name="description_en" rows="3"></textarea>
                    @if ($errors->has('description_en'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description_en') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="order" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.sort-order') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="order" type="number" min='1'
                           class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order"
                           required    >
                    @if ($errors->has('order'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('order') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{--submit button--}}
            <div class="form-group row mb-0">
                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-floppy-o mr-1" aria-hidden="true"></i> @lang('transAdmin.save')
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $('.summernote').summernote({
            tabsize: 2,
            height: 200
        });
    </script>
    <style>
        .note-group-select-from-files {
            display: none;
        }
        .note-icon-picture {
            display: none;
        }
        .note-icon-video {
            display: none;
        }
    </style>

@endsection
