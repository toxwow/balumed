@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/service.js') }}" defer></script>
@endpush
@section('content')
    <div class="title-header">
        <h3>Usługi</h3>
        <div class="actions">
            <a href="{{ route('uslugi.create') }}" class="btn btn-primary"><i class="lni lni-plus"></i> Dodaj nową
                usługę</a>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success" style="margin-top: 30px;">
            {{ session('status') }}
        </div>
    @endif
    <div class="box-wrapper">
        <div class="sub-title">Lista usług</div>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="text-align: center" colspan="2">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $key => $service)
                    <tr class="{{ $service->status === 0 ? 'inactive-tr' : 'active-tr' }}">
                        <td scope="row">{{ $service->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center">
                                <img src="{{ Storage::url('files/shares/uslugi/icon/' . $service->icon) }}" width="50px">
                                <span style="margin-left: 15px">{{ $service->name }}</span>
                            </div>
                        </td>
                        <td><select class="form-control change" data-attribute="status" data-id="{{ $service->id }}"
                                data-slug="{{ $service->slug }}">
                                <option data-status="1" {{ $service->status === 1 ? 'selected' : '' }}>Widoczny</option>
                                <option data-status="0" {{ $service->status === 0 ? 'selected' : '' }}>Ukryty</option>
                            </select>
                        </td>
                        <td style="text-align: right">
                            <a href="{{ route('uslugi.edit', $service->id) }}"><i class="lni lni-pencil-alt"></i></a>
                        </td>
                        <td>
                            <i class="lni lni-more-alt" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('uslugi.show', $service->slug) }}">Zobacz</a>
                                @csrf
                                <a class="dropdown-item" href="#" data-type="delete" data-id="{{ $service->id }}"
                                    data-slug="{{ $service->slug }}">Usuń</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="table-action"
            style="display: flex; justify-content: flex-end; border-top: 1px solid #e3eef6; padding-top: 20px;">

        </div>

    </div>
@endsection
