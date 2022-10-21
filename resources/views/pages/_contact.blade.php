@extends('layouts.page',
[
    'seo'=> '',
    'uslugaActive' => false,
    'footerStatus' => false,
    'metaDescription' => 'Specjalistyczne Centrum Medyczne Balumed znajduje się w Warszawie przy ul.Sarmackiej 18/93. Sprawdź godziny otwarcia i umów się na wizytę już dziś!',
    'pageTitle' => 'Kontakt: znajdź naszą poradnię i umów się na wizytę | Balumed Warszawa'
])
@push('script')

    <script>
        var map;
        function initMap() {
            var myLatLng = {lat: 52.160405, lng: 21.078106};
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 16,
                styles: [
                    {
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#616161"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#bdbdbd"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e5e5e5"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#dadada"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#616161"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    },
                    {
                        "featureType": "transit.line",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e5e5e5"
                            }
                        ]
                    },
                    {
                        "featureType": "transit.station",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#c9c9c9"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    }
                ]
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: "{{asset('images/icons/pin-map.png')}}"
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNQCaZnAUhNXeKsGDpDDUJzWDaUNpmhUQ&callback=initMap&libraries=&v=weekly"
        async defer
    ></script>
@endpush
@push('css')
    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
    <style>
        div.footer{
            display: none;
        }
    </style>
@endpush
@section('content')

    <div class="content-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <h1 class="title">Kontakt </h1>
                    <p class="description">znajdź naszą poradnię i umów się na wizytę</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 mt-4  d-lg-flex ">
                            <div class="link-footer">
                                <h2 class="title">Adres</h2>
                                <div class="info">
                                    ul. Sarmacka 18<br>
                                    02-972 Warszawa, Wilanów <br>
                                    (wejście od ul. Herbu Szreniawa)
                                </div>
                                <a href="https://goo.gl/maps/cRBA1K8QbMAcj45c9" class="link primary-link arrow">prowadź</a>
                            </div>
                        </div>
                        <div class="col-12 mt-4  d-lg-flex">
                            <div class="link-footer">
                                <h2 class="title">Godziny otwarcia</h2>
                                <div class="info">
                                    <b>Pon - Pt:</b> {{$info->working_days}}<br>
                                    <b>Sb: </b> {{$info->holiday_days}}<br>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4 d-lg-flex">
                            <div class="link-footer">
                                <h2 class="title">Kontakt</h2>
                                <div class="info">
                                    tel: {{$info->phone_one}}<br>
                                    tel: {{$info->phone_two}}<br>
                                    email: balumed@balumed.pl
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-4">
                    <div class="contact-page__image">
                        <img src="{{url('images/contact-page-img.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map"></div>

@endsection
