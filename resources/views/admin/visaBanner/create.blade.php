@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.visaBanner.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.baner')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.create')
        </div>
    </div>
    <div class="my-4">

        <form action="{{ route ('admin.visaBanner.store') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}



            <div class="form-group row">
                <label for="image" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') <span class="text-secondary">(1221x310)</span>
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
                <label for="image" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') RU<span class="text-secondary">(1221x310)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid image_ru_upload img-max border">
                    </div>
                    <div class="custom-file">
                        <input id="image_ru" type="file"
                               class="custom-file-input {{ $errors->has('image_ru') ? ' is-invalid' : '' }}"
                               name="image_ru" onChange="image_ruUpload(this);">
                        <label class="custom-file-label" for="image_ru">. . .</label>
                    </div>
                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_ru') }}</strong>
                            </span>
                    @endif
                    <script>
                        function image_ruUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image_ru').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_ru_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') EN<span class="text-secondary">(1221x310)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid image_ru_upload img-max border">
                    </div>
                    <div class="custom-file">
                        <input id="image_ru" type="file"
                               class="custom-file-input {{ $errors->has('image_ru') ? ' is-invalid' : '' }}"
                               name="image_ru" onChange="image_ruUpload(this);">
                        <label class="custom-file-label" for="image_ru">. . .</label>
                    </div>
                    @if ($errors->has('image_ru'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_ru') }}</strong>
                            </span>
                    @endif
                    <script>
                        function image_ruUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image_ru').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_ru_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
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


@endsection
