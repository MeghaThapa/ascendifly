@extends('admin.layouts.master')
@section('title', $title)
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <!-- Include page breadcrumb -->
        @include('admin.inc.breadcrumb')
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <a href="{{ route($route . '.index') }}" class="btn btn-info">{{ __('dashboard.back') }}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">{{ __('dashboard.edit') }} {{ $title }}</h4>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route($route . '.update', $row->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <!-- Form Start -->
                            <div class="form-group">
                                <label for="title">{{ __('dashboard.title') }} <span>*</span></label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ $row->title }}" required>

                                <div class="invalid-feedback">
                                    {{ __('dashboard.please_provide') }} {{ __('dashboard.title') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="meta_title">{{ __('dashboard.meta_title') }} <span>*</span></label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title"
                                    value="{{ $row->meta_title }}" required>

                                <div class="invalid-feedback">
                                    {{ __('dashboard.please_provide') }} {{ __('dashboard.meta_title') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="meta_description">{{ __('dashboard.meta_description') }}:
                                    <span>{{ __('dashboard.meta_desc_length') }}</span></label>
                                <textarea class="form-control" name="meta_description" id="meta_description" rows="4">{!! $row->meta_description !!}</textarea>

                                <div class="invalid-feedback">
                                    {{ __('dashboard.please_provide') }} {{ __('dashboard.meta_description') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="meta_keywords">{{ __('dashboard.meta_keywords') }}:
                                    <span>{{ __('dashboard.keywords_separate') }}</span></label>
                                <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="4">{!! $row->meta_keywords !!}</textarea>

                                <div class="invalid-feedback">
                                    {{ __('dashboard.please_provide') }} {{ __('dashboard.meta_keywords') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('dashboard.description') }} <span>*</span></label>
                                <textarea class="form-control textMediaEditor" name="description" id="description" rows="8" required>{!! $row->description !!}</textarea>

                                <div class="invalid-feedback">
                                    {{ __('dashboard.please_provide') }} {{ __('dashboard.description') }}
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="status">{{ __('dashboard.select_status') }}</label>
                                <select class="wide" name="status" id="status" data-plugin="customselect">
                                    <option value="1" @if ($row->status == 1) selected @endif>
                                        {{ __('dashboard.active') }}</option>
                                    <option value="0" @if ($row->status == 0) selected @endif>
                                        {{ __('dashboard.inactive') }}</option>
                                </select>
                            </div> --}}
                            <!-- Form End -->
                        </div>
                        <div class="card-footer">
                            <a href="{{ route($route . '.index') }}">
                                <button type="button" class="btn btn-light"
                                    data-dismiss="modal">{{ __('dashboard.close') }}</button>
                            </a>
                            <button type="submit" class="btn btn-primary">{{ __('dashboard.update') }}</button>
                        </div>
                    </form>
                </div>
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- container -->
    <!-- End Content-->
@endsection
