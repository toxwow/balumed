
@php
$stickyMassage = true;
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-55505936-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-55505936-1');
    </script>

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

    @stack('css')
    @stack('script')
    <meta name="google-site-verification" content="V64VHfcMVCLJRUtbOGwPfZi22d686gkqtD50w-_AHMI" />
</head>
<body>
    <div id="app">
    @if($stickyMassage === true)
        <div class="massage-wrapper">
            <div class="container">
                <a href="{{route('uslugi.show', 'punkt-szczepien')}}">Szczepienia przeciw grypie sezonowej 2022/2023</a>
            </div>
        </div>
    @endif
    <div class="top-bar">
        <div class="container">

            <div class="social-wrapper">
                <a href="https://www.facebook.com/przychodniabalumed/" target="_blank" class="social-wrapper-fb">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23.855" viewBox="0 0 24 23.855">
                        <g id="facebook_1_" data-name="facebook (1)" transform="translate(0 -0.073)">
                          <path id="Path_9266" data-name="Path 9266" d="M24,12.073A12.01,12.01,0,0,1,13.87,23.928V15.565h2.789l.531-3.46H13.87V9.86a1.73,1.73,0,0,1,1.95-1.869h1.509V5.045a18.392,18.392,0,0,0-2.679-.234c-2.734,0-4.52,1.657-4.52,4.656V12.1H7.091v3.46H10.13v8.363A12,12,0,1,1,24,12.073Z" fill="#fff"/>
                        </g>
                      </svg>                      
                    <span>
                        Facebook
                    </span>                      
                </a>
                <a href="https://wa.me/787655660" target="_blank" class="social-wrapper-whats">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23.885" height="24" viewBox="0 0 23.885 24">
                        <g id="WA_Logo" transform="translate(-0.057)">
                          <g id="Group_1077" data-name="Group 1077">
                            <path id="Path_9265" data-name="Path 9265" d="M20.463,3.488A11.9,11.9,0,0,0,1.745,17.838L.057,24l6.3-1.654a11.88,11.88,0,0,0,5.683,1.448h.005A11.9,11.9,0,0,0,20.463,3.488Zm-8.413,18.3h0a9.859,9.859,0,0,1-5.031-1.378l-.361-.214-3.741.981,1-3.648-.235-.374a9.884,9.884,0,1,1,8.373,4.633Zm5.422-7.4c-.3-.149-1.758-.868-2.031-.967s-.47-.149-.669.148-.767.967-.941,1.166-.347.223-.644.074a8.111,8.111,0,0,1-2.39-1.475,8.945,8.945,0,0,1-1.653-2.059c-.173-.3-.018-.458.13-.606s.3-.347.446-.521a1.975,1.975,0,0,0,.3-.495.546.546,0,0,0-.025-.521c-.075-.148-.669-1.611-.916-2.206s-.486-.5-.669-.51-.371-.01-.57-.01a1.089,1.089,0,0,0-.792.372,3.337,3.337,0,0,0-1.04,2.479A5.783,5.783,0,0,0,7.22,12.325,13.24,13.24,0,0,0,12.3,16.812a17.194,17.194,0,0,0,1.694.626,4.085,4.085,0,0,0,1.872.118,3.061,3.061,0,0,0,2.006-1.413,2.472,2.472,0,0,0,.173-1.413C17.967,14.6,17.769,14.531,17.472,14.382Z" fill="#fff" fill-rule="evenodd"/>
                          </g>
                        </g>
                      </svg>
                    <span>
                        WhatsApp
                    </span>  
                </a>
                
            </div>
            <div class="contact-wrapper">
                <div class="phone">

                    <span><a href="tel:{{$info->phone_one}}">{{$info->phone_one}}</a></span><span>, <a href="tel:{{$info->phone_two}}">{{$info->phone_two}}</a></span>
                </div>
                <div class="email">
                    <span><a href="mailto:balumed@balumed.pl">balumed@balumed.pl</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-wrapper">
        <div class="container">
            <div class="menu-wrapper__holder">
                <div class="brand-logo-mobile">
                    <a href="{{route('home')}}"><img src="{{url('images/logo-bg.png')}}" alt=""></a>
                </div>
                <div class="hamburger hamburger--elastic" >
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>

            </div>
            <nav>
                <div class="brand-logo">
                    <a href="{{route('home')}}"><img src="{{url('images/logo-bg.png')}}" alt=""></a>
                </div>
                <div class="items-wrapper">
                    {{-- <a href="{{route('aktualnosci.index')}}" class="item link {{ (request()->is('aktualnosci*')) ? 'active' : '' }}">Aktualności</a> --}}
                    <a href="{{route('shedule')}}" class="item link {{ (request()->is('harmonogram-pracy-lekarzy')) ? 'active' : '' }}">Terminarz przyjęć</a>
                    <!-- <div class="item dropdown">
                        Nasze usługi
                    </div> -->
                    @if($uslugaActive === true)
                        <a href="/neonatologia" class="item link active">Nasze usługi</a>
                    @else
                        <a href="/neonatologia" class="item link">Nasze usługi</a>
                    @endif
                    <a href="{{route('specjalisci.index')}}" class="item link {{ (request()->is('specjalisci')) ? 'active' : '' }}">Nasi specjaliści</a>
                    <!-- <a href="{{route('blog.index')}}" class="item link {{ (request()->is('blog*')) ? 'active' : '' }}">Blog</a> -->
                    <!-- <a href="{{route('galery')}}" class="item link {{ (request()->is('galeria')) ? 'active' : '' }}">Galeria</a> -->
                    <a href="{{route('contact')}}" class="item link {{ (request()->is('kontakt')) ? 'active' : '' }}">Kontakt</a>
                    <!-- <a href="{{route('contact')}}" class="item btn btn-primary btn-outline"><img src="{{url('images/icons/calendar.png')}}">Umów wizytę</a> -->
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
                                <img src="{{url('images/icons/phone-person1.png')}}" alt="">
                            </div>
                            <div class="text-wrapper">
                                <p>Masz pytania? Chciałbyś umówić się na wizytę?</p>
                                <p>Skontaktuj się z nami pod numerem <strong><a href="tel:{{$info->phone_one}}">{{$info->phone_one}}</a></strong></p>
                            </div>
                        </div>
                        <!-- <div class="right-social">
                            <div class="btn-wrapper">
                                <a href="https://www.facebook.com/przychodniabalumed/" target="_blank" class="btn btn-grey"><img src="{{url('images/icons/facebook.png')}}" alt=""></a>
                                <a href="https://www.instagram.com/balumed/" class="btn btn-grey" target="_blank"><img src="{{url('images/icons/instagram.png')}}" alt=""></a>
                                <a href="{{route('contact')}}" class="btn btn-primary">umów się na wizytę</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                @if($footerStatus === true)
                <div class="col-12 col-md-4 mt-4 d-lg-flex justify-content-lg-start">
                    <div class="link-footer">
                        <div class="title">Adres</div>
                        <div class="info">
                            ul. Sarmacka 18<br>
                            02-972 Warszawa, Wilanów <br>
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
                            tel: <a href="tel:{{$info->phone_one}}">{{$info->phone_one}}</a><br>
                            tel: <a href="tel:{{$info->phone_two}}">{{$info->phone_two}}</a><br>
                            email: <a href="mailto: balumed@balumed.pl">balumed@balumed.pl</a>
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
                    <ul class="glide__slides" style="align-items: center;">
                        @foreach($partners as $partner)
                        <li class="glide__slide" style="text-align: center">

                            <img style="width: 100%; max-width: 120px;" src="{{asset('storage/'.$partner)}}" alt="">
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
            copyright © 2021 <br>
            wykonanie <a href="https://undefined.com.pl">undefined.com.pl</a>
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

            @if($articleOnlyModal->isEmpty())
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
                                    @foreach($articleOnlyModal as $modal)
                                        <div class="img-wrapper-modal" style="background-image: url({{asset('storage/files/shares/aktualnosci/'.$modal->photo)}})"></div>
                                        <h3 class="modal-title">{{$modal->title}}</h3>
                                        <p class="modal-description">{{$modal->contents}}</p>
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
<!-- Messenger Wtyczka czatu Code -->
    <div id="fb-root"></div>

    <!-- Your Wtyczka czatu code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "234037293425042");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/pl_PL/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>
