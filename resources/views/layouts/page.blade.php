@php
$stickyMassage = true;
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{$metaDescription ?? ""}}">

    <title>{{$pageTitle ?? ""}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/page/index.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/layouts/page.css') }}" rel="stylesheet">
{{--    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">--}}

    @stack('css')
    @stack('script')
</head>
<body>
    <div id="app">
    @if($stickyMassage === true)
        <div class="massage-wrapper">
            <div class="container">
                <a href="{{route('uslugi.show', 'punkt-szczepien')}}">SZCZEPIENIA COVID-19</a>
            </div>
        </div>
    @endif
    <div class="top-bar">
        <div class="container">
            <div class="contact-wrapper">
                <div class="phone">

                    <span>{{$info->phone_one}}</span><span>, {{$info->phone_two}}</span>
                </div>
                <div class="email">
                    <span>balumed@balumed.pl</span>
                </div>
            </div>
            <div class="social-wrapper">
                <a href="https://www.facebook.com/przychodniabalumed/" target="_blank"><img src="{{url('images/icons/facebook.png')}}" alt=""></a>
                <a href="https://www.instagram.com/balumed/" target="_blank"><img src="{{url('images/icons/instagram.png')}}" alt=""></a>
            </div>
            <div class="hamburger hamburger--elastic" >
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="menu-wrapper">
        <div class="container">
            <nav>
                <div class="brand-logo">
                    <a href="{{route('home')}}"><img src="{{url('images/logo-bg.png')}}" alt=""></a>
                </div>
                <div class="items-wrapper">
                    <a href="{{route('aktualnosci.index')}}" class="item link {{ (request()->is('aktualnosci*')) ? 'active' : '' }}">Aktualności</a>
                    <div class="item dropdown">
                        Nasze usługi
                    </div>
                    <a href="{{route('home')}}" class="item link mobile {{ (request()->is('/')) ? 'active' : '' }}" >Strona główna</a>
                    <a href="{{route('uslugi.index')}}" class="item link mobile ">Nasze usługi</a>
                    <a href="{{route('specjalisci.index')}}" class="item link {{ (request()->is('specjalisci')) ? 'active' : '' }}">Nasi specjaliści</a>
                    <!-- <a href="{{route('blog.index')}}" class="item link {{ (request()->is('blog*')) ? 'active' : '' }}">Blog</a> -->
                    <a href="{{route('galery')}}" class="item link {{ (request()->is('galeria')) ? 'active' : '' }}">Galeria</a>
                    <a href="{{route('contact')}}" class="item link {{ (request()->is('kontakt')) ? 'active' : '' }}">Kontakt</a>
                    <a href="{{route('contact')}}" class="item btn btn-primary btn-outline"><img src="{{url('images/icons/calendar.png')}}">Umów wizytę</a>
                </div>
            </nav>
        </div>
        <div class="second-nav">
            <div class="container">
                <div class="row">
                    @foreach($servicesMenu as $service)
                    <div class="col-3 my-2">
                        <a href="{{route('uslugi.show', $service->slug)}}">
                            <img class="icon" src="{{asset('storage/files/shares/uslugi/icon/'.$service->icon)}}" alt="" class="icon">
                            {{$service->name}}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        @yield('content')
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-wrapper">
                        <div class="left-contact">
                            <div class="avatar-wrapper">
                                <img src="{{url('images/icons/phone-person.png')}}" alt="">
                            </div>
                            <div class="text-wrapper">
                                <p>Masz pytania? Chciałbyś umówić się na wizytę?</p>
                                <p>Skontaktuj się z nami pod numerem <strong>{{$info->phone_one}}</strong></p>
                            </div>
                        </div>
                        <div class="right-social">
                            <div class="btn-wrapper">
                                <a href="https://www.facebook.com/przychodniabalumed/" target="_blank" class="btn btn-grey"><img src="{{url('images/icons/facebook.png')}}" alt=""></a>
                                <a href="https://www.instagram.com/balumed/" class="btn btn-grey" target="_blank"><img src="{{url('images/icons/instagram.png')}}" alt=""></a>
                                <a href="{{route('contact')}}" class="btn btn-primary">umów się na wizytę</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if($footerStatus === true)
                <div class="col-12 col-md-4 mt-4 d-lg-flex justify-content-lg-start">
                    <div class="link-footer">
                        <div class="title">Adres</div>
                        <div class="info">
                            ul. Sarmacka 18 lok 93<br>
                            02-972 Warszawa, Wiladnów <br>
                            (wejście od ul. Herbu Szreniawa)
                        </div>
                        <a href="https://goo.gl/maps/cRBA1K8QbMAcj45c9" class="link primary-link arrow">prowadź</a>
                    </div>
                </div>
                <div class="col-12 col-md-4 mt-4 d-lg-flex justify-content-lg-center">
                    <div class="link-footer">
                        <div class="title">Godziny otwarcia</div>
                        <div class="info">
                            <b>Pon - Pt:</b> {{$info->working_days}}<br>
                            <b>Sb: </b> {{$info->holiday_days}}<br>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 mt-4 d-lg-flex justify-content-lg-end">
                    <div class="link-footer">
                        <div class="title">Kontakt</div>
                        <div class="info">
                            tel: {{$info->phone_one}}<br>
                            tel: {{$info->phone_two}}<br>
                            email: kontakt@balumed.pl
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="seo-text">
                        <p>{{$seo}}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="partners">
        <div class="container">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @foreach($partners as $partner)
                        <li class="glide__slide" style="text-align: center">

                            <img src="{{asset('storage/'.$partner)}}" alt="">
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="donation">
        <div class="container">
            <div class="logos-wrapper">
                <div>
                    <img src="{{url('images/program_regionalny.png')}}" alt="">
                </div>
                <div>
                    <img src="{{url('images/mazowsze_serce_polski.png')}}" alt="">
                </div>
                <div>
                    <img src="{{url('images/ue.png')}}" alt="">
                </div>
            </div>
            <div class="text">
                „Specjalistyczne Centrum Medyczne Profilaktyki, Diagnostyki i Terapii Małego Dziecka” - Projekt współfinansowany przez Unię Europejską ze środków Europejskiego Funduszu Rozwoju Regionalnego w ramach Regionalnego Programu Operacyjnego Województwa Mazowieckiego 2007-2013.
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            copyright © 2021
        </div>
    </div>
        <div>

            <!-- Modal -->


            @if($articleModal->isEmpty())
            @else

                @if($modalCheck !== null)

                @else

                    <div class="modal  fade" tabindex="-1" role="dialog" id="my-modal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    @csrf

                                    <button type="button" class="close set-cookie" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="text-align: center">
                                    @foreach($articleModal as $modal)
                                        <div class="img-wrapper-modal" style="background-image: url({{asset('storage/files/shares/aktualnosci/'.$modal->photo)}})"></div>
                                        <h3 class="modal-title">{{$modal->title}}</h3>
                                        <p class="modal-description">{{$modal->description}}</p>
                                        <a class="btn btn-primary btn-modal set-cookie" href="{{route('aktualnosci.show', $modal->slug)}}">czytaj więcej</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endif
        </div>
</div>
{{--    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer ></script>--}}

</body>
</html>
