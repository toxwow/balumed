@extends('layouts.page',
[
    'seo'=> '',
    'footerStatus' => false
])
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/fancybox.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="content-wrapper">
<div class="container">
    <div class="wrapper-title">
        <div>
            <h1 class="title">Galeria </h1>
            <p class="description">Zobacz naszą galerie zdjęć</p>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000465.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000465.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000492.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000492.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000558.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000558.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000628.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000628.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000703.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000703.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000744.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000744.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000778.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000778.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000845.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000845.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000817.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000817.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000320.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000320.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000577.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000577.jpg')}}"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="gallery-item" style="background-image: url({{url('images/galeria/R0000534.jpg')}})">
                    <a data-fancybox="gallery" href="{{url('images/galeria/R0000534.jpg')}}"></a>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
