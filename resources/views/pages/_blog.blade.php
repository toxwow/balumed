@extends('layouts.page',
[
    'seo'=> '',
    'footerStatus' => false
])
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="content-wrapper with-bg-simple">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <p class="title">Blog</p>
                    <p class="description">Nasze najnowsze wpisy</p>
                </div>
                <div style="padding-left: 50px; text-align: right;">
                    <a href="{{route('blog.index')}}" class="link primary-link plus">zobacz pozostałe wpisy</a>
                </div>
            </div>
        </div>

        <div class="container single-post mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="img-wrapper" style="background-image: url({{asset('storage/files/shares/blog/'.$post->photo)}})"></div>
                </div>
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="content">
                        <div class="title">
                            @foreach($post->tags as $tag)
                                <span class="tag">{{$tag->name}}</span>
                            @endforeach
                            <h1>{{$post->title}}</h1>
                            <p class="date">{{$post->created_at->format('j.m.Y')}}</p>
                        </div>
                        <p class="description">
                            {{$post->description}}
                        </p>
                        <div class="main">{{$post->contents}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
