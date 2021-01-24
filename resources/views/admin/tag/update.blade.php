@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/createHelper.js') }}" defer></script>

@endpush
@section('content')

    <div class="title-header">
        <h3>Edytuj tag</h3>
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
        <form name="blogAdd"  action="{{route('tagi.update', $tag->id)}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" name="name" id="title" placeholder="Wpisz tytuł bloga" value="{{ $tag->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Podaj adres bloga" value="{{ $tag->slug }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status">Typ</label>
                                <select class="form-control" id="type" name="type">
                                    <option {{ $tag->type == 0 ? "selected" : "" }} value="0" >Aktualności</option>
                                    <option {{ $tag->type == 1 ? "selected" : "" }} value="1">Blog</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="btn btn-primary" type="submit">Zaktualizuj</button>
        </form>

    </div>
@endsection
