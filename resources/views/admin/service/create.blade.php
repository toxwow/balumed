@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/createHelper.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>

@endpush
@section('content')

    <div class="title-header">
        <h3>Nowa usługa</h3>
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
        <form name="serviceAdd"  action="{{route('uslugi.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="photo">Ikona</label>
                        <input type="file" class="form-control" name="icon"/>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="name">Nazwa usługi</label>
                        <input type="text" class="form-control" name="name" id="title" placeholder="Wpisz nazwę usługi" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Podaj adres usługi" value="{{ old('slug') }}">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option {{ old('status') == 0 ? "selected" : "" }} value="0" >Ukryty</option>
                            <option {{ old('status') == 1 ? "selected" : "" }} value="1">Widoczny</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="metaDescriptionService">Meta description seo</label>
                        <textarea type="text" class="form-control"name="metaDescriptionService" style="height: 100px;">{{old('metaDescriptionService')}}</textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pageTitleService">Page Title seo</label>
                        <textarea type="text" class="form-control"name="pageTitleService" style="height: 100px;">{{old('pageTitleService')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="intro">Wstępny opis</label>
                        <textarea type="text" class="form-control"name="intro" style="height: 100px;">{{old('intro')}}</textarea>
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
