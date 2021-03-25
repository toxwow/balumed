@extends('layouts.page',
[
    'seo'=> 'Nasi lekarze to wysokiej klasy specjaliści pediatrzy, neonatolodzy, ginekolodzy, położnicy z wieloletnią praktyką w wiodących szpitalach klinicznych i uniwersyteckich, dla których leczenie jest pasją i sposobem na życie. W Centrum Medycznym Balumed dajemy także możliwość konsultacji specjalistycznych m.in.: alergologa, chirurga dziecięcego, kardiologa dziecięcego, nefrologa, radiologa czy urologa.',
    'footerStatus' => true,
    'metaDescription' => 'Lekarze świadczący usługi w warszawskim Centrum Medycznym Balumed to wykwalifikowani specjaliści z wieloletnim doświadczeniem. Sprawdź sam!',
    'pageTitle' => 'Specjaliści: poznaj nas bliżej | Balumed Warszawa'
])
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="content-wrapper with-bg">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <h1 class="title">Specjaliści&nbsp;z wieloletnią praktyką medyczną</h1>
                    <p class="description seo-description">Miły i doskonale przeszkolony personel sprawi, że każda wizyta w naszej warszawskiej poradni będzie przyjazna dla mam i ich maluszków.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($specialists as $specialist)
                    <div class="col-12 col-sm-6 col-md-4 mt-5">
                        <div class="card-secondary">
                            <div class="img-wrapper" style="background-image: url({{asset('storage/files/shares/specjalisci/'.$specialist->photo)}})"></div>
                            <div class="person-name">
                                <p class="titles">{{$specialist->titlePerson}}</p>
                                <h2 class="name">{{$specialist->name}}</h2>
                                @if((!$specialist->services->isEmpty()))
                                @foreach($specialist->services as $key => $service)
                                        <span class="services">@if($key != '0'), @endif<a href="{{route('uslugi.show', $service->slug)}}">{{$service->name}}</a>
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

@endsection
