@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/createHelper.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>

@endpush
@section('content')

    <div class="title-header">
        <h3>Edytuj usługę</h3>
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
        <form name="blogAdd"  action="{{route('uslugi.update', $service->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="icon">Ikona</label>
                        <img src="{{Storage::url('files/shares/uslugi/icon/'.$service->icon)}}" style="height: 76px; display: block; margin-bottom: 10px;">
                        <input type="file" class="form-control" name="icon"/>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" name="name" id="title" placeholder="Wpisz tytuł bloga" value="{{ $service->name }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Podaj adres bloga" value="{{ $service->slug }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option {{ $service->status == 0 ? "selected" : "" }} value="0" >Ukryty</option>
                                    <option {{ $service->status == 1 ? "selected" : "" }} value="1">Widoczny</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="metaDescriptionService">Meta description seo</label>
                        <textarea type="text" class="form-control"name="metaDescriptionService" style="height: 100px;">{{$service->metaDescriptionService}}</textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pageTitleService">Page Title seo</label>
                        <textarea type="text" class="form-control"name="pageTitleService" style="height: 100px;">{{$service->pageTitleService}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="intro">Wstępny opis</label>
                        <textarea type="text" class="form-control" name="intro" style="height: 100px;">{{$service->intro}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="description">Treść</label>
                        <textarea type="text" class="form-control" id="summernote" name="description" style="height: 250px;">{{$service->description}}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Zaktualizuj</button>
        </form>

    </div>
@endsection
