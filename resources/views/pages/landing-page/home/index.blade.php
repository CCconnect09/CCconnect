@extends('pages.landing-page.layouts.main')

{{-- --------------------------------- Title --}}
@section('title', $title)

{{-- --------------------------------- Links --}}
@section('additional_links')
@endsection

{{-- --------------------------------- Content --}}
@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-6 mb-3 header-about bg-home w-100 pb-5">
                <div class="container pt-2 pt-sm-5">
                    <div class="row d-flex align-items-center text-sm-start text-center">
                        <div class="col-md-6 col-12" style="z-index: 10">
                            <h1 class="text-white fw-bold">{!! config('web_config')['TEXT_HERO_HEADER'] !!}</h1>
                            <p class="text-white fs-4 pt-3 pt-sm-4 w-100 ">
                                {!! config('web_config')['TEXT_HERO_DESCRIPTION'] !!}
                            </p>
                        </div>
                        <div class="col text-center text-md-end mt-5 mt-sm-0">
                            <img src="{{ asset('images/cloud storage.png') }}" alt="illustrasi laptop" class="illust-home"
                                width="70%">
                        </div>
                    </div>
                    <div class="poligon d-none d-md-block"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="container">
                    <div class="garis"></div>
                    <div class="row alur-lapor mt-5 d-flex text-center align-content-start">
                        <div class="col">
                            <div class="ellipse">
                                <img src="{{ asset('images/icon/edit-property.svg') }}" alt="icon" width="32">
                            </div>
                            <h5 class="mt-2">
                                Write a Complaint</h5>
                            <p class="d-md-block d-none">Share your story completely and in detail.</p>
                        </div>
                        <div class="col">
                            <div class="ellipse">
                                <img src="{{ asset('images/icon/in-progress.svg') }}" alt="icon" width="36">
                            </div>
                            <h5 class="mt-2">
                                Verification Process</h5>
                            <p class="d-md-block d-none">
                                Your complaint will be checked and verified first.
                            </p>
                        </div>
                        <div class="col">
                            <div class="ellipse">
                                <img src="{{ asset('images/icon/Messaging.svg') }}" alt="icon" width="37">
                            </div>
                            <h5 class="mt-2">
                                Follow-up</h5>
                            <p class="d-md-block d-none">The Office will proceed and handle the confession swiftly.
                            </p>
                        </div>
                        <div class="col">
                            <div class="ellipse">
                                <img src="{{ asset('images/icon/chat-bubble.svg') }}" alt="icon" width="37">
                            </div>
                            <h5 class="mt-2">Get Response</h5>
                            <p class="d-md-block d-none">After that, your confession will receive a response from the Office.
                            </p>
                        </div>
                        <div class="col">
                            <div class="ellipse">
                                <img src="{{ asset('images/icon/Done.svg') }}" alt="icon" width="37">
                            </div>
                            <h5 class="mt-2">Finished</h5>
                            <p class="d-md-block d-none">Your confession has been processed by the Office!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center mt-5">
                        @can('student')
                            <a href="/dashboard/confessions/create" class="btn btn-lapor rounded-3 fw-bold">Create Complaint</a>
                        @endcan
                        @guest
                            <a href="/login" class="btn btn-lapor rounded-3 fw-bold">Create Complaint</a>
                        @endguest
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 jumlah-lapor mt-5 text-center">
                        <h3 class="text-white mt-4 fs-2">Number of Acknowledgments</h3><br>
                        <p class="text-white fw-bold fs-1 mt-2"> {{ $confessionsCount }} </p><br>
                        <p class="text-white fw-bold fs-3 "></p>
                    </div>
                </div>
                <div class="container">
                    <div class="row my-5">
                        <div class="col-12 mb-5">
                            <h2 class="text-center">Benefits of Using{{ config('web_config')['TEXT_WEB_TITLE'] }}</h2>
                        </div>
                        <div class="row card-keuntungan d-block d-md-flex justify-content-center text-center mx-auto">
                            <div class="col-12 col-lg-4">
                                <div class="card ms-auto">
                                    <div class="card-body">
                                        <div class="ellipse">
                                            <img src="../images/icon/privasi.svg" alt="icon" width="36"
                                                class="icon-keuntungan">
                                        </div>
                                        <h5 class="my-3">Privacy Maintained</h5>
                                        <p>
                                            This application was specially created to keep your personal data safe and secure
                                            privacy. So, you can use it without any worries! Your privacy is paramount
                                            main thing here. Enjoy the experience of using the application without worry~
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card mx-auto">
                                    <div class="card-body">
                                        <div class="ellipse">
                                            <img src="../images/icon/keamanan.svg" alt="icon" width="35"
                                                class="icon-keuntungan">
                                        </div>
                                        <h5 class="my-3">Report Safely</h5>
                                        <p>{{ config('web_config')['TEXT_WEB_TITLE'] }} provide a reporting platform
                                            which is safe and reliable. Here, you are free to express various things
                                            your problems, experiences or thoughts without having to worry about leaks
                                            your identity. Freedom of speech, safety and comfort.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card me-auto">
                                    <div class="card-body">
                                        <div class="ellipse">
                                            <img src="../images/icon/tanggap.svg" alt="icon" width="36"
                                                class="icon-keuntungan">
                                        </div>
                                        <h5 class="my-3">Responded Quickly</h5>
                                        <p>
                                            Every complaints you share will be immediately responded to. So, you don't just
                                            can 'speak', but also feel 'heard' with appropriate responses to
                                            complaints, suggestions, or input that you provide. Come on, share your opinion, us
                                            ready to listen!
                                        </p>
                                    </div>
                                </div>
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
    {{-- Apply sweetalert for error --}}
    @if (session()->has('alert') &&
            array_key_exists('config', session('alert')) &&
            json_decode(session('alert')['config'], true)['icon'] === 'error')
        @include('sweetalert::alert')
    @endif

    {{-- Forget success alert config --}}
    @if (session()->has('alert') &&
            array_key_exists('config', session('alert')) &&
            json_decode(session('alert')['config'], true)['icon'] === 'success')
        {{ Session::forget('alert') }}
    @endif
@endsection
