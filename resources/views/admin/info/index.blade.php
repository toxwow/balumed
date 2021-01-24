@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/info.js') }}" defer></script>
@endpush
@section('content')

<div class="title-header">
    <h3>Informacje</h3>
</div>
@if (session('status'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session('status') }}
    </div>
@endif
<div class="box-wrapper">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="working">Godziny d.robocze</label>
                    <input type="text" class="form-control" name="working_days" value="{{$info->first()->working_days}}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="holiday">Godziny sobota</label>
                    <input type="text" class="form-control" name="holiday_days" value="{{$info->first()->holiday_days}}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="phone_one">Telefon 1</label>
                    <input type="text" class="form-control" name="phone_one" value="{{$info->first()->phone_one}}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="phone_two">Telefon 2</label>
                    <input type="text" class="form-control" name="phone_two" value="{{$info->first()->phone_two}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button id="changeData" disabled class="btn btn-primary w-100">Zmień dane</button>
            </div>
        </div>
</div>


@endsection
