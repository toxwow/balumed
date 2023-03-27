@extends('layouts.page', [
    'seo' => '',
    'uslugaActive' => true,
    'footerStatus' => true,
    'metaDescription' => $specialist->description,
    'pageTitle' => $specialist->name . " | Balumed Warszawa",
])

@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="content-wrapper specialist-page">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <h3 class="title">Nasze usługi</h3>
                    <p class="description">Zapoznaj się z naszą ofertą</p>
                </div>
            </div>
        </div>
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 nav-service order-2 order-md-1">
                        <div class="mobile-service-text">Zobacz pozostałe usługi:</div>
                        <ul>

                            @foreach ($services as $element)
                                <li>
                                


                                <a href="{{ route('uslugi.show', $element->slug) }}">
                                    <img class="icon"
                                        src="{{ asset('storage/files/shares/uslugi/icon/' . $element->icon) }}" alt=""
                                        class="icon">
                                    <span>{{ $element->name }}</span>
                                </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 col-md-8 order-1 order-md-2">
                        <p class="specialist-page__titles">{{$specialist->titlePerson}}</p>
                        <h1 class="specialist-page__name">{{$specialist->name}}</h1>
                        <article>
                            {{$specialist->description}}
                        </article>
                        @if((!$specialist->services->isEmpty()))
                            <div class="specialist-page__services mb-3">
                                <p>Usługi jakie świadczy {{$specialist->name}}: </p>
                                @foreach($specialist->services as $key => $service)
                                    <span class="services"><a href="{{route('uslugi.show', $service->slug)}}">{{$service->name}}</a>
                                </span>
                            @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
