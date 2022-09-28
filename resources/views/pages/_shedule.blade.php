@extends('layouts.page',
[
    'seo'=> '',
    'uslugaActive' => false,
    'footerStatus' => false,
    'metaDescription' => 'Specjalistyczne Centrum Medyczne Balumed znajduje się w Warszawie przy ul.Sarmackiej 18/93. Sprawdź godziny pracy naszych lekarzy i umów się na wizytę już dziś!',
    'pageTitle' => 'Tygodniowy Harmonogram: znajdź wybranego specjalistę i umów się na wizytę | Balumed Warszawa'
])

@push('css')

    <link href="{{ asset('css/page/_sub_page.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="content-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <div>
                    <h1 class="title">Tygodniowy Harmonogram </h1>
                    <p class="description">Zapoznaj się terminarzem przyjęć lekarzy w Specjalistycznym Centrum Medycznym w Warszawie - Balumed.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-balumed">
                            <thead>
                            <tr>
                                <td>Lekarz</td>
                                <td>Specjalność</td>
                                <td>Pon.</td>
                                <td>Wt.</td>
                                <td>Śr.</td>
                                <td>Czw.</td>
                                <td>Pt.</td>
                                <td>Sob.</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <span>prof.dr hab.n.med.</span>
                                    <h4 class="mb-0">Bożena Kociszewska- Najman</h4>
                                </td>
                                <td>
                                    <p> <a href="{{route('uslugi.show', 'neonantologia')}}"> Neonantologia </a></p>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'pediatria')}}">Pediatria</a></p>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p>16:00-18:00</p>
                                    <p class="mb-0">16:00-18:00</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p>10:00-14:00</p>
                                    <p class="mb-0">10:00-14:00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>lek.med.</span>
                                    <h4 class="mb-0">Anna Komorowska- Piotrowska</h4>
                                </td>
                                <td>
                                    <p><a href="{{route('uslugi.show', 'pediatria')}}">Pediatria</a></p>
                                    <p><a href="{{route('uslugi.show', 'pulmonolog-dzieciecy')}}">Pulmonologia</a></p>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'usg-pluc-dzieci')}}">USG płuc</a></p>
                                </td>
                                <td>
                                    <p>10:00-18:00</p>
                                    <p>10:00-18:00</p>
                                    <p class="mb-0">10:00-18:00</p>
                                </td>
                                <td>
                                    <p>10:00-14:00</p>
                                    <p>10:00-14:00</p>
                                    <p class="mb-0">10:00-14:00</p>
                                </td>
                                <td></td>
                                <td>
                                    <p>10:00-18:00</p>
                                    <p>10:00-18:00</p>
                                    <p class="mb-0">10:00-18:00</p>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>lek.med.</span>
                                    <h4 class="mb-0">Kacper Gajko</h4>
                                </td>
                                <td>
                                    <p><a href="{{route('uslugi.show', 'pediatria')}}">Pediatria</a></p>
                                    <p><a href="{{route('uslugi.show', 'usg-pluc-dzieci')}}">USG płuc</a></p>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'punkt-szczepien')}}">Szczepienia</a></p>
                                </td>
                                <td></td>
                                <td>
                                    <p>16:00-19:00</p>
                                    <p>16:00-19:00</p>
                                    <p class="mb-0">16:00-19:00</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p>16:00-19:00</p>
                                    <p>16:00-19:00</p>
                                    <p class="mb-0">16:00-19:00</p>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>dr n.med.</span>
                                    <h4 class="mb-0">Ewa Zacharska-Kokot</h4>
                                </td>
                                <td>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'echo-serca-dzieci')}}">Echo serca</a></p>
                                </td>
                                <td><p class="mb-0">17:00-20:00</p></td>
                                <td></td>
                                <td><p class="mb-0">17:00-20:00</p></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>lek.med.</span>
                                    <h4 class="mb-0">Krystyna Malinowska</h4>
                                </td>
                                <td>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'neurolog-dzieciecy')}}">Neurologia</a></p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><p class="mb-0">10:00-15:00</p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>dr n.med.</span>
                                    <h4 class="mb-0">Hanna Kocoń</h4>
                                </td>
                                <td>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'ortopeda')}}">Ortopedia</a></p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><p class="mb-0">16:00-19:00</p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>lek.med.</span>
                                    <h4 class="mb-0">Wojciech Żakiewicz</h4>
                                </td>
                                <td>
                                    <p><a href="{{route('uslugi.show', 'ortopeda')}}">Ortopedia</a></p>
                                    <p  class="mb-0"><a href="{{route('uslugi.show', 'usg-dorosli')}}">USG</a></p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    {{-- <p>16:00-19:00</p>
                                    <p class="mb-0">16:00-19:00</p> --}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>dr hab.n.med.</span>
                                    <h4 class="mb-0">Renata Bokiniec</h4>
                                </td>
                                <td>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'usg-dorosli')}}">USG</a></p>
                                </td>
                                <td></td>
                                <td><p class="mb-0">16:00-18:00</p></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>dr n.med.</span>
                                    <h4 class="mb-0">Agnieszka Biejat</h4>
                                </td>
                                <td>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'usg-dorosli')}}">USG</a></p>
                                </td>
                                <td></td>
                                <td></td>
                                <td><p class="mb-0">08:00-11:00</p></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>mgr</span>
                                    <h4 class="mb-0">Monika Grabowska</h4>
                                </td>
                                <td>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'rehabilitacja-dzieci-i-doroslych')}}">Rehabilitacja</a></p>
                                </td>
                                <td></td>
                                <td></td>
                                <td><p class="mb-0">10:00-13:00</p></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>mgr</span>
                                    <h4 class="mb-0">Justyna Konopczyńska - Brodzik</h4>
                                </td>
                                <td>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'rehabilitacja-oddechowa')}}">Fizjoterapia oddechowa</a></p>
                                </td>
                                <td><p class="mb-0">16:00-18:00</p></td>
                                <td><p class="mb-0">16:00-18:00</p></td>
                                <td></td>
                                <td><p class="mb-0">16:00-18:00</p></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <span>mgr</span>
                                    <h4 class="mb-0">Agnieszka Osińska</h4>
                                </td>
                                <td>
                                    <p><a href="{{route('uslugi.show', 'badania-laboratoryjne')}}">Pobieranie krwi</a></p>
                                    <p class="mb-0"><a href="{{route('uslugi.show', 'punkt-szczepien')}}">Szczepienia</a></p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p>09:00-12:00</p>
                                    <p class="mb-0">09:00-12:00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>mgr</span>
                                    <h4 class="mb-0">Magdalena Bednarczyk</h4>
                                </td>
                                <td>
                                    <p><a href="{{route('uslugi.show', 'neurologopeda')}}">Neurologopedia</a></p>
                                    <p class="mb-0"> <a href="{{route('uslugi.show', 'doradca-laktacyjny')}}">Doradztwo laktacyjne</a></p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p>10:00-14:00</p>
                                    <p class="mb-0">10:00-14:00</p>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
