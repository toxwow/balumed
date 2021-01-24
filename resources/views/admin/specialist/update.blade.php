@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/createHelper.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js" defer></script>

@endpush
@section('content')

    <div class="title-header">
        <h3>Edytuj specjaliste</h3>
    </div>
    <div class="box-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form name="blogAdd"  action="{{route('specjalisci.update', $specialist->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="photo">Zdjęcie</label>
                        <img src="{{Storage::url('files/shares/specjalisci/'.$specialist->photo)}}" style="height: 76px; display: block; margin-bottom: 10px;">
                        <input type="file" class="form-control" name="photo"/>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Imię i nazwisko</label>
                                <input type="text" class="form-control" name="name" id="title" placeholder="Wpisz tytuł bloga" value="{{ $specialist->name }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title-person">Tytuł naukowy</label>
                                <input type="text" class="form-control" name="titlePerson" placeholder="Podaj tytuł naukowy" value="{{ $specialist->titlePerson }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Podaj adres bloga" value="{{ $specialist->slug }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option {{ $specialist->status == 0 ? "selected" : "" }} value="0" >Ukryty</option>
                                    <option {{ $specialist->status == 1 ? "selected" : "" }} value="1">Widoczny</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="services">Usługi</label>
                                <select class="form-control selectpicker" name="services[]" multiple title="Wybierz usługi...">

                                        @foreach($specialist->services as $own)
                                                <option selected value="{{$own->id}}">{{$own -> name}}</option>
                                        @endforeach
                                        @foreach($services->diff($specialist->services) as $rest)
                                                <option value="{{$rest->id}}">{{$rest -> name}}</option>
                                        @endforeach


                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="description">Treść</label>
                        <textarea type="text" class="form-control" id="summernote" name="description" style="height: 250px;">{{$specialist->description}}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Zaktualizuj</button>
        </form>

    </div>
@endsection
