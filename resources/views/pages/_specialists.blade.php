@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')
{{--    <div class="header-sub-page-wrapper">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <h1>Wyspecjalizowana kadra medyczna</h1>--}}
{{--                    <p class="description">For a time I worked in a convenience store as a clerk and cook and I used a deep fryer quite a bit for cooking battered chicken and French fried potatoes.--}}
{{--                        Of course the chicken doesn’t start out battered. It comes delivered frozen in big cardboard boxes. Before the chicken is ready for the cooking part it must be</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="content-wrapper with-bg">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <p class="title">Nasza kadra</p>
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
                                <p class="name">{{$specialist->name}}</p>
                                @if((!$specialist->services->isEmpty()))
                                @foreach($specialist->services as $key => $service)
                                        <span class="services">
                                        @if($key != '0'),@endif
                                            {{$service->name}}
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
