@extends('layouts.page',
[
    'seo'=> '',
    'footerStatus' => true
])
@push('css')
    <link href="{{ asset('css/page/_home.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6" >
                    <h1>Specjalistyczne<br>Centrum Medyczne</h1>
                    <h2>Profilaktyki, Diagnostyki i Terapii Małego Dziecka</h2>
                    <p class="description">For a time I worked in a convenience store as a clerk and cook and I used a deep fryer quite a bit for cooking battered chicken and French fried potatoes.
                        Of course the chicken doesn’t start out battered. It comes delivered frozen in big cardboard boxes. Before the chicken is ready for the cooking part it must be</p>
                <div class="btn-wrapper">
                    <a href="" class="btn btn-primary">Skontaktuj się z nami</a>
                    <a href="" class="btn btn-primary btn-outline"><img class="icon" src="{{url('images/icons/phone.png')}}"><span> zadzwoń </span>{{$info->phone_one}}</a>
                </div>
                </div>
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
                    <h5 class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vestibulum vehicula vehicula. Etiam id velit vitae enim ultrices convallis.</h5>
                    <ul class="primary-list">
                        <li data-aos="fade-left" data-aos-delay="750" data-aos-duration="1000">1200 przyjętych pacjentów</li>
                        <li data-aos="fade-left" data-aos-delay="1000" data-aos-duration="1000">24 wyspecjalizownych lekarzy</li>
                        <li data-aos="fade-left" data-aos-delay="1250" data-aos-duration="1000">8 najnowych urządzeń ultrasonograficznych</li>
                        <li data-aos="fade-left" data-aos-delay="1500" data-aos-duration="1000">14 gabinetów</li>
                    </ul>
                    <div class="btn-wrapper">
                        <a href="" class="btn btn-primary">Umów się na wizytę</a>
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
                        <a href="" class="btn btn-primary">dowiedz się więcej</a>
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
                    <div class="col-12 col-sm-6  col-md-4 mt-4" data-aos="fade-up" data-aos-duration="1000"
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

@endsection
