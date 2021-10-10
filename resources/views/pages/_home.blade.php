@extends('layouts.page',
[
    'seo'=> '',
    'footerStatus' => true,
    'metaDescription' => 'Centrum Medyczne Balumed znajdujące się w Warszawie przy ul. Sarmackiej 18 świadczy profesjonalne usługi medyczne w szerokim zakresie. Sprawdź!',
    'pageTitle' => 'Specjalistyczne Centrum Medyczne Warszawa. Przychodnia Wilanów Sarmacka | Balumed'
])
@push('css')
    <link href="{{ asset('css/page/_home.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6" >
                    <h1>Balumed - Specjalistyczne Centrum Medyczne w Warszawie</h1>
                    <p class="description">Specjalistyczne Centrum Medyczne Profilaktyki, Diagnostyki i Terapii Małego Dziecka powstało z myślą o zapewnieniu pełnej i wysokospecjalistycznej opieki zdrowotnej najmłodszym pacjentom już od momentu ich poczęcia. Nasza działalność skupiona jest na takich dziedzinach medycyny jak <a href="
  /pediatria">pediatria</a>, <a href="
  /neonatologia">neonatologia</a> oraz położnictwo z <a href="
  /ginekologia">ginekologią</a>. Ciąże fizjologiczne, a także ciąże wysokiego ryzyka położniczego prowadzone są przez wysokiej klasy specjalist&oacute;w położnictwa i ginekologii z dużym doświadczeniem klinicznym.</p>
                <div class="btn-wrapper">
                    <a href="{{route('contact')}}" class="btn btn-primary">Skontaktuj się z nami</a>
                    <a href="" class="btn btn-primary btn-outline"><img class="icon" src="{{url('images/icons/phone.png')}}"><span> zadzwoń </span>{{$info->phone_one}}</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <p class="title">Aktualności</p>
                    <p class="description">Zapoznaj się z najnowszymi informacjami</p>
                </div>
                <div style="padding-left: 50px; text-align: right;">
                    <a href="{{route('aktualnosci.index')}}" class="link primary-link plus">zobacz wszystkie aktualności</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($articles->slice(0, 3) as $key => $article)
                    <div class="col-12 col-sm-6  col-md-4 my-4" data-aos="fade-up" data-aos-duration="1000"
                         @if($key == 0)
                            data-aos-delay="500"
                         @elseif($key == 1)
                            data-aos-delay="750"
                         @else
                            data-aos-delay="1000"
                        @endif
                    >
                        <div class="card-secondary">
                            <div class="img-wrapper" style="background-image: url({{asset('storage/files/shares/aktualnosci/'.$article->photo)}})"></div>
                            <div class="article-info">
                                <p class="date">{{$article->created_at->format('j.m.Y')}}</p>
                                <p class="title">{{$article->title}}</p>
                            </div>
                            <div class="article-description">
                                <p class="description">{{substrwords($article->description, 200)}}</p>
                            </div>
                            <div class="action-wrapper">
                                <a href="{{route('aktualnosci.show', $article->slug)}}" class="link primary-link arrow">czytaj dalej</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="services-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <p class="title">Nasze usługi</p>
                    <p class="description">Kompleksowe usługi medyczne</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                @foreach($services as $service)
                    <div class="col-12 col-sm-6 col-md-4 mt-4">
                        <div class="card">
                            <img class="icon" src="{{asset('storage/files/shares/uslugi/icon/'.$service->icon)}}" alt="" class="icon">
                            <h2 class="name">{{$service->name}}</h2>
                            <p class="description">{{$service->intro}}</p>
                            <a href="{{route('uslugi.show', $service->slug)}}" class="link primary-link arrow">dowiedz się więcej</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="profits-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="img-wrapper"></div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="wrapper-title">
                        <div>
                            <p class="title">Dlaczego my?</p>
                            <p class="description">Profesjonalne podejscie dla każdego pacjenta</p>
                        </div>
                    </div>
                    <h5 class="text">Nowoczesna przychodnia z doświadczonymi specjalistami</h5>
                    <ul class="primary-list">
                        <li data-aos="fade-left" data-aos-delay="750" data-aos-duration="1000">Nasze gabinety wyposażone zostały w najnowszej generacji sprzęt medyczny</li>
                        <li data-aos="fade-left" data-aos-delay="1000" data-aos-duration="1000">Wnętrze przychodni zaprojektowano tak, by było przyjazne mamom i ich maluchom</li>
                        <li data-aos="fade-left" data-aos-delay="1250" data-aos-duration="1000">Zdrowie i zaufanie naszych Pacjentów jest dla nas najważniejsze</li>
                        <li data-aos="fade-left" data-aos-delay="1500" data-aos-duration="1000">W Balumed zwracamy uwagę na najistotniejsze zagadnienia po porodzie, jakimi są między innymi: żywienie, pielęgnacja, szczepienia dziecka, problemy emocjonalne matki, czy też rola ojca w opiece nad matką i dzieckiem. </li>
                    </ul>
                    <div class="btn-wrapper">
                        <a href="{{route('contact')}}" class="btn btn-primary">Umów się na wizytę</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="specialist-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <p class="title">Nasi specjaliści</p>
                    <p class="description">Profesjonalna kadra</p>
                </div>
                <div style="padding-left: 50px; text-align: right;">
                    <a href="{{route('specjalisci.index')}}" class="link primary-link plus">zobacz wszystkich lekarzy</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($specialists->slice(0, 3) as $key=> $specialist)
                    <div class="col-12 col-sm-6 col-md-4 mt-5" data-aos="fade-up" data-aos-duration="1000"
                    @if($key == 0)
                    data-aos-delay="500"
                         @elseif($key == 1)
                         data-aos-delay="750"
                         @else
                         data-aos-delay="1000"
                     @endif
                    >
                        <div class="card-secondary">
                            <div class="img-wrapper" style="background-image: url({{asset('storage/files/shares/specjalisci/'.$specialist->photo)}})"></div>
                            <div class="person-name">
                                <p class="titles">{{$specialist->titlePerson}}</p>
                                <h3 class="name">{{$specialist->name}}</h3>
                                @if((!$specialist->services->isEmpty()))
                                    @foreach($specialist->services as $key => $service)
                                        <span class="services">
                                        @if($key != '0'),@endif
                                            <a href="{{route('uslugi.show', $service->slug)}}">{{$service->name}}</a>
                                    </span>
                                    @endforeach
                                @else
                                    <span class="services">&nbsp;</span>
                                @endif
                            </div>
                            <div class="person-description">
                                <p class="description">{{substrwords($specialist->description, 200)}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="promotion-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" data-aos="fade-right" data-aos-duration="1000">
                    <div class="wrapper-title">
                        <div>
                            <p class="title">Fototeriapia w domu</p>
                            <p class="description">Intensywna terapia w łagodnym otoczeniu</p>
                        </div>
                    </div>
                    <h5 class="text">Innowacyjny, najnowocześniejszy i najbardziej efektywny sposób degradacji bilirubiny i leczenia żółtaczki w Polsce.</h5>
                    <p class="description">W przypadku, gdy pomiar bilirubiny wskazuje, że Twoje dziecko ma wysoki poziom bilirubiny i są wskazania do leczenia nasilonej żółtaczki fizjologicznej za pomocą fototerapii, w centrum medycznym BALUMED można wypożyczyć lampę neoBLUE do domu. </p>
                    <div class="btn-wrapper">
                        <a href="{{route('uslugi.show', 'fototerapia-w-domu')}}" class="btn btn-primary">dowiedz się więcej</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
