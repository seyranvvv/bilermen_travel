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
            @lang('transAdmin.create')
        </div>
    </div>
    <div class="my-4">

        <form action="{{ route ('admin.country.store') }}" method="post" enctype="multipart/form-data">
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
                <label for="name_tm" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="name_tm"
                              class="form-control{{ $errors->has('name_tm') ? ' is-invalid' : '' }} summernote"
                              name="name_tm" rows="3"></textarea>
                    @if ($errors->has('name_tm'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name_tm') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name_ru" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="name_ru"
                              class="form-control{{ $errors->has('name_ru') ? ' is-invalid' : '' }} summernote"
                              name="name_ru" rows="3"></textarea>
                    @if ($errors->has('name_ru'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name_ru') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name_en" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="name_en"
                              class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }} summernote"
                              name="name_en" rows="3"></textarea>
                    @if ($errors->has('name_en'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name_en') }}</strong>
                            </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="image" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') <span class="text-secondary">(290x197)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid image_upload img-max border">
                    </div>
                    <div class="custom-file">
                        <input id="image" type="file"
                               class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}"
                               name="image" onChange="imageUpload(this);">
                        <label class="custom-file-label" for="image">. . .</label>
                    </div>
                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                    @endif
                    <script>
                        function imageUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>





            <div class="form-group row">
                <label for="image_en" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transFront.home_image')
                   <span class="text-secondary">(500x500)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3 uploaded-imgs">

                            <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                                 class="img-fluid image_en_upload img-max border">

                    </div>
                    <div class="custom-file">
                        <input id="image_en" type="file" multiple
                               class="custom-file-input {{ $errors->has('image_en') ? ' is-invalid' : '' }}"
                               name="image_index" accept="image/*" onChange="image_enUpload(this);">
                        <label class="custom-file-label" for="image_en">. . .</label>
                    </div>
                    @if ($errors->has('image_en'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_en') }}</strong>
                            </span>
                    @endif
                    <script>
                        function image_enUpload(input) {
                            if (input.files && input.files[0]) {
                                // $('.uploaded-imgs').empty(image);
                                // for (const file of input.files) {
                                //     let image = `
                                //         <img src="${e.target.result}" alt="not-found"
                                //             class="img-fluid image_en_upload_${index} img-max border">
                                //         `;
                                //     $('.uploaded-imgs').append(image);
                                //     var reader = new FileReader();
                                //     reader.onload = function (e) {
                                //         $(`.image_en_upload_${index}`).attr('src', e.target.result);
                                //     };
                                //     reader.readAsDataURL(file);
                                // }
                                var label = input.files[0].name;
                                $('#image_en').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_en_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>

<div class="form-group row">
                <label for="image_banner" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transFront.banner_image') <span>(1221x310)</span>
                    <span class="text-secondary"></span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">

                            <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                                 class="img-fluid image_banner_upload img-max border">

                    </div>
                    <div class="custom-file">
                        <input id="image_banner" type="file"
                               class="custom-file-input {{ $errors->has('image_banner') ? ' is-invalid' : '' }}"
                               name="image_banner" accept="image/*" onChange="image_bannerUpload(this);">
                        <label class="custom-file-label" for="image_banner">. . .</label>
                    </div>
                    @if ($errors->has('image_banner'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_banner') }}</strong>
                            </span>
                    @endif
                    <script>
                        function image_bannerUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image_banner').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_banner_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>



	<div class="form-group row">
                <label for="icon" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    Icon <span class="text-secondary">(png, svg)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid icon_upload img-max border">
                    </div>
                    <div class="custom-file">
                        <input id="icon" type="file"
                               class="custom-file-input {{ $errors->has('icon') ? ' is-invalid' : '' }}"
                               name="icon" onChange="iconUpload(this);">
                        <label class="custom-file-label" for="icon">. . .</label>
                    </div>
                    @if ($errors->has('icon'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('icon') }}</strong>
                            </span>
                    @endif
                    <script>
                        function iconUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#icon').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.icon_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
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



            <div class="form-group row">
                <div class="custom-control custom-checkbox col-lg-6 col-md-8 col-form-label text-md-right">

                    <input type="checkbox" class="custom-control-input" id="customControlActive" name="active" value="1">
                    <label class="custom-control-label" for="customControlActive">
                        Aktiw
                    </label>
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
