@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/createHelper.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js" defer></script>

@endpush
@section('content')

    <div class="title-header">
        <h3>Edytuj aktualności</h3>
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
        <form name="blogAdd"  action="{{route('aktualnosci.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="photo">Zdjęcie</label>
                        <img src="{{Storage::url('/files/shares/aktualnosci/'.$post->photo)}}" style="height: 100px; display: block; margin-bottom: 10px;">
                        <input type="file" class="form-control" name="photo"/>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Tytuł</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Wpisz tytuł bloga" value="{{ $post->title }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Podaj adres bloga" value="{{ $post->slug }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option {{ $post->status == 0 ? "selected" : "" }} value="0" >Ukryty</option>
                                    <option {{ $post->status == 1 ? "selected" : "" }} value="1">Widoczny</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="services">Tag aktualności</label>
                                <select class="form-control selectpicker" name="tags[]" multiple title="Wybierz tag...">
                                    @foreach($post->tags as $tag)
                                        <option selected value="{{$tag->id}}">{{$tag -> name}}</option>
                                    @endforeach
                                    @foreach($tags->diff($post->tags) as $tag)
                                        <option value="{{$tag->id}}">{{$tag -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="description">Opis wpisu</label>
                                <textarea type="text" name="description" class="form-control" id="description">{{$post->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="contents">Treść</label>
                        <textarea type="text" class="form-control" id="summernote" name="contents" style="height: 250px;">{{$post->contents}}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Zaktualizuj</button>
        </form>

    </div>
@endsection
