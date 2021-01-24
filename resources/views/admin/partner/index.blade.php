@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/service.js') }}" defer></script>
@endpush
@section('content')

<div class="title-header">
    <h3>Partnerzy</h3>
</div>
@if (session('status'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session('status') }}
    </div>
@endif
<div class="box-wrapper">
{{$partners}}
</div>


@endsection
