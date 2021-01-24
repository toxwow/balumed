@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">

@endpush
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <p class="title">Nasza usługi</p>
                    <p class="description">Zapoznaj się z naszą ofertą</p>
                </div>
            </div>
        </div>
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 nav-service order-2 order-md-1">
                        <ul>
                            @foreach($services as $element)
                                <li>
                                    <a href="{{route('uslugi.show', $element->slug)}}">
                                        <img class="icon" src="{{asset('storage/files/shares/uslugi/icon/'.$service->icon)}}" alt="" class="icon">
                                        <span>{{$element->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 col-md-8 order-1 order-md-2">
                        <p>{!! $service->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
