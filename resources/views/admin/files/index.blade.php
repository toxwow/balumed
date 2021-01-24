@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/blog.js') }}" defer></script>
@endpush
@section('content')

<div class="title-header">
    <h3>Zarządzaj plikami</h3>
</div>
@if (session('status'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session('status') }}
    </div>
@endif
<div class="box-wrapper">
    <iframe src="/filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

</div>

@endsection
