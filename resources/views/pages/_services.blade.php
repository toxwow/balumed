@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="content-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <p class="title">Nasza oferta</p>
                    <p class="description">Zapoznaj się z naszymi usługami</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-12 col-sm-6 col-md-4 mt-4">
                        <div class="card">
                            <img class="icon" src="{{asset('storage/files/shares/uslugi/icon/'.$service->icon)}}" alt="" class="icon">
                            <h4 class="name">{{$service->name}}</h4>
                            <p class="description">{{$service->intro}}</p>
                            <a href="{{route('uslugi.show', $service->slug)}}" class="link primary-link arrow">dowiedz się więcej</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
