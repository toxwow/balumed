@extends('layouts.page', [
    'seo' => '',
    'uslugaActive' => true,
    'footerStatus' => true,
    'metaDescription' => $service->metaDescriptionService,
    'pageTitle' => $service->pageTitleService,
])

@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="content-wrapper">
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
                                @if ($element->id === $service->id)
                                    <li class="active">
                                    @else
                                    <li>
                                @endif



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
                        {!! $service->description !!}
                        @if($specialists)
                            <div class="specialist-page__services">
                                    <p>Sprawdź lekarzy świadczących usługę {{$service->name}}</p>
                                <div class="row">
                                    @foreach($specialists as $item)
                                        @if($item->first()->status == 1)
                                            <div class="col-12 col-md-6 mb-3">
                                                <div class="card-secondary">
                                                    <div class="person-name">
                                                        <p class="titles">{{$item->first()->titlePerson}}</p>
                                                        <h2 class="name">{{$item->first()->name}}</h2>
                                                    </div>
                                                    <a href="{{route('specjalisci.show', $item->first()->slug)}}" class="link primary-link arrow mt-2">
                                                        zobacz
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
