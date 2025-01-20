@extends('pages.dashboard.layouts.main')

{{-- --------------------------------- Title --}}
@section('title', $title)

{{-- --------------------------------- Links --}}
@section('additional_links')
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}" />
    {{-- Quill --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/quill/quill.snow.css') }}" />
    {{-- Form: select option --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    {{-- Image preview --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}" />
@endsection

{{-- --------------------------------- Content --}}
@section('content')
    <div class="page-heading mb-0">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h2>Edit Confession</h2>
                    <p class="text-subtitle text-muted">
                        Make edits to an existing confession.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a href="{{ back()->getTargetUrl() }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Return to the previous page."
                            class="btn btn-secondary px-2 pt-2 me-1">
                            <span class="fa-fw fa-lg select-all fas text-white"></span>
                            Back
                        </a>
                        <a data-bs-toggle="tooltip" data-bs-original-title="Unsend your confession." href="#"
                            class="btn btn-danger px-2 pt-2 me-1" data-confirm-confession-destroy="true"
                            data-unique="{{ base64_encode($confession->slug) }}">
                            <span data-confirm-confession-destroy="true"
                                data-unique="{{ base64_encode($confession->slug) }}"
                                class="fa-fw fa-lg select-all fas"></span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/dashboard/confessions/{{ $confession->slug }}/responses/create">Confessions</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chronology</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="/dashboard/confessions/{{ $confession->slug }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-1">
                                            <div
                                                class="form-group has-icon-left mandatory @error('title'){{ 'is-invalid' }}@enderror">
                                                <label for="title" class="form-label">Title</label>
                                                <div class="position-relative">
                                                    <input autofocus type="text" class="form-control py-2"
                                                        placeholder="e.g. I was bullied..." id="title" name="title"
                                                        value="{{ old('title') ?? $confession->title }}" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-card-heading py-2"></i>
                                                    </div>

                                                    @error('title')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <div
                                                class="form-group has-icon-left mandatory @error('slug'){{ 'is-invalid' }}@enderror">
                                                <label for="slug" class="form-label">Slug</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control py-2"
                                                        placeholder="e.g. i-was-bullied" id="slug" name="slug"
                                                        value="{{ old('slug') ?? $confession->slug }}" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-pencil py-2"></i>
                                                    </div>

                                                    @error('slug')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <div
                                                class="form-group has-icon-left mandatory @error('date'){{ 'is-invalid' }}@enderror">
                                                <label for="date" class="form-label">Date</label>
                                                <div class="position-relative">
                                                    <input type="date" class="form-control py-2" id="date" name="date"
                                                        value="{{ old('date') ?? $confession->date }}" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-day py-2"></i>
                                                    </div>

                                                    @error('date')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <div class="form-group mandatory">
                                                <label for="categories" class="form-label">Category</label>
                                                <select class="choices form-select" id="categories"
                                                    name="id_confession_category">
                                                    <optgroup label="Category">
                                                        @forelse ($confessionCategories as $category)
                                                            <option @if (old('id_confession_category', $confession->category_slug) == $category->slug) selected @endif
                                                                value="{{ $category->slug }}">
                                                                {{ $category->category_name }}</option>
                                                        @empty
                                                            <option>No category</option>
                                                        @endforelse
                                                    </optgroup>
                                                </select>

                                                @error('id_confession_category')
                                                    <div class="invalid-feedback d-block" style="margin-top: -24px">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-1">
                                            <div class="form-group mandatory @error('place'){{ 'is-invalid' }}@enderror">
                                                <fieldset>
                                                    <label class="form-label">
                                                        Place of Incident
                                                    </label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="place"
                                                            id="place-in" value="in"
                                                            @if ((old('place') ?? $confession->place) == 'in') checked @endif />
                                                        <label data-bs-toggle="tooltip"
                                                            data-bs-original-title="The incident occurred inside the school."
                                                            class="form-check-label form-label" for="place-in">
                                                            Inside school
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="place"
                                                            id="place-out" value="out"
                                                            @if ((old('place') ?? $confession->place) == 'out') checked @endif />
                                                        <label data-bs-toggle="tooltip"
                                                            data-bs-original-title="The incident occurred outside the school."
                                                            class="form-check-label form-label" for="place-out">
                                                            Outside school
                                                        </label>
                                                    </div>
                                                </fieldset>

                                                @error('place')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <div
                                                class="form-group mandatory @error('privacy'){{ 'is-invalid' }}@enderror">
                                                <fieldset>
                                                    <label class="form-label">
                                                        Confession Privacy
                                                    </label>
                                                    <div class="d-flex">
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" name="privacy"
                                                                id="privacy-anonymous" value="anonymous"
                                                                @if (old('privacy') ?? $confession->privacy == 'anonymous') checked @endif />
                                                            <label data-bs-toggle="tooltip"
                                                                data-bs-original-title="Your name will be hidden from other students."
                                                                class="form-check-label form-label"
                                                                for="privacy-anonymous">
                                                                Anonymous
                                                            </label>
                                                        </div>
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" name="privacy"
                                                                id="privacy-public" value="public"
                                                                @if (old('privacy') ?? $confession->privacy == 'public') checked @endif />
                                                            <label data-bs-toggle="tooltip"
                                                                data-bs-original-title="Your name will be visible to other students."
                                                                class="form-check-label form-label" for="privacy-public">
                                                                Public
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                @error('privacy')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-1">
                                            <div class="form-group">
                                                <div class="position-relative">
                                                    <label
                                                        class="@if ($confession->image) {{ 'd-block' }} @endif{{ 'form-label' }} @error('image'){{ 'text-danger' }}@enderror">Photo</label>

                                                    {{-- Image preview --}}
                                                    @if ($confession->image)
                                                        <div class="mb-2">
                                                            <a data-bs-toggle="tooltip"
                                                                data-bs-original-title="Delete confession photo."
                                                                class="btn btn-danger px-2 pt-2"
                                                                data-confirm-confession-image-destroy="true"
                                                                data-redirect="{{ base64_encode($confession->slug) }}"
                                                                data-unique="{{ base64_encode($confession->slug) }}">
                                                                <span data-confirm-confession-image-destroy="true"
                                                                    data-redirect="{{ base64_encode($confession->slug) }}"
                                                                    data-unique="{{ base64_encode($confession->slug) }}"
                                                                    class="fa-fw fa-lg select-all fas"></span>
                                                            </a>
                                                        </div>

                                                        <img src="{{ asset("storage/$confession->image") }}"
                                                            class="img-preview img-fluid mb-3 col-sm-5 rounded">
                                                    @endif

                                                    {{-- File uploader with image preview --}}
                                                    <input type="file" class="image-preview-filepond" name="image"
                                                        id="image" />

                                                    @error('image')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-1">
                                            <div class="form-group mandatory @error('body'){{ 'is-invalid' }}@enderror">
                                                <div class="position-relative">
                                                    <label class="form-label">Confession Details</label>

                                                    <input id="body" name="body"
                                                        value="{{ old('body') ?? $confession->body }}" type="hidden">
                                                    <div id="editor">
                                                        {!! old('body') ?? $confession->body !!}
                                                    </div>

                                                    @error('body')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-2 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- --------------------------------- Scripts --}}
@section('additional_scripts')
    {{-- Forget error alert config --}}
    @if (session()->has('alert') &&
            array_key_exists('config', session('alert')) &&
            json_decode(session('alert')['config'], true)['icon'] === 'error')
        {{ Session::forget('alert') }}
    @endif

    {{-- Quill --}}
    <script src="{{ asset('assets/extensions/quill/quill.min.js') }}"></script>
    @vite(['resources/js/quill/confession/confession.js'])
    {{-- Jquery --}}
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    {{-- Form: select option --}}
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }}"></script>
    {{-- Image and Sluggable --}}
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}">
    </script>
    @vite(['resources/js/filepond/image-preview.js'])
    @vite(['resources/js/sluggable/confession/confession.js'])
    {{-- SweetAlert --}}
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    @vite(['resources/js/sweetalert/confession/confession.js'])
@endsection
