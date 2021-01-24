@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/createHelper.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js" defer></script>

@endpush
@section('content')

    <div class="title-header">
        <h3>Nowa specjalisty</h3>
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
        <form name="serviceAdd"  action="{{route('specjalisci.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="photo">Zdjęcie</label>
                        <input type="file" class="form-control" name="photo"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Imię i nazwisko</label>
                        <input type="text" class="form-control" name="name" id="title" placeholder="Podaj imię i naziwsko" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="title-person">Tytuł naukowy</label>
                        <input type="text" class="form-control" name="titlePerson" placeholder="Podaj tytuł naukowy" value="{{ old('title-person') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Podaj adres www" value="{{ old('slug') }}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option {{ old('status') == 0 ? "selected" : "" }} value="0" >Ukryty</option>
                            <option {{ old('status') == 1 ? "selected" : "" }} value="1">Widoczny</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="services">Usługi</label>
                            <select class="selectpicker" name="services[]" multiple title="Wybierz usługi...">
                                @foreach($services as $service)
                                   <option value="{{$service->id}}">{{$service -> name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="description">Treść</label>
                        <textarea type="text" class="form-control" id="summernote" name="description" style="height: 250px;">{{old('contents')}}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Dodaj usługe</button>
        </form>

    </div>
@endsection
