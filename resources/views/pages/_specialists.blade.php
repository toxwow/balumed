@extends('layouts.page',
[
    'seo'=> '',
    'footerStatus' => true
])
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="content-wrapper with-bg">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <h1 class="title">Nasza kadra</h1>
                    <p class="description">Poznaj naszych lekarzy</p>
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
