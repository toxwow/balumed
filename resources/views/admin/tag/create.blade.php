@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/createHelper.js') }}" defer></script>
@endpush
@section('content')

    <div class="title-header">
        <h3>Nowy tag</h3>
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
        <form name="serviceAdd"  action="{{route('tagi.store')}}" method="POST">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Nazwa tagu</label>
                        <input type="text" class="form-control" name="name" id="title" placeholder="Wpisz nazwę tagu" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Podaj adres usługi" value="{{ old('slug') }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="status">Typ</label>
                        <select class="form-control" id="status" name="type">
                            <option value="" disabled selected>Wybierz typ</option>
                            <option value="0" name="0" >Blog</option>
                            <option value="1" name="1">Aktualności</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Dodaj tag</button>
        </form>

    </div>
@endsection
