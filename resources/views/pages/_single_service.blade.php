@extends('layouts.page',
[
    'seo'=> '',
    'footerStatus' => true,
    'metaDescription' => $service -> metaDescriptionService,
    'pageTitle' => $service -> pageTitleService
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
                            @foreach($services as $element)
                                @if($element->id === $service->id)
                                @else
                                <li>



                                    <a href="{{route('uslugi.show', $element->slug)}}">
                                        <img class="icon" src="{{asset('storage/files/shares/uslugi/icon/'.$service->icon)}}" alt="" class="icon">
                                        <span>{{$element->name}}</span>
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 col-md-8 order-1 order-md-2">

                        {!! $service->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
