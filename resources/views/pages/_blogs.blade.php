@extends('layouts.page',
[
    'seo'=> '',
    'footerStatus' => false
])
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="content-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <h1 class="title">Blog</h1>
                    <p class="description">Nasze najnowsze wpisy</p>
                </div>
            </div>
        </div>
        <div class="container list-post">
            <div class="row">
                <div class="col-12">
                    @foreach($posts as $post)
                        <a class="link-post" href="{{route('blog.show', $post->slug)}}">
                        <div class="article-wrapper">
                            <div class="img-wrapper d-none d-md-block" style="background-image: url({{asset('storage/files/shares/blog/'.$post->photo)}})"></div>
                            <div class="info-wrapper">
                                @foreach($post->tags as $tag)
                                    <span class="tag">{{$tag->name}}</span>
                                @endforeach
                                <h2 class="title">{{$post->title}}</h2>
                                <p class="description">{{substrwords($post->description, 200)}}</p>
                                <p class="date">{{$post->created_at->format('j.m.Y')}}</p>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
