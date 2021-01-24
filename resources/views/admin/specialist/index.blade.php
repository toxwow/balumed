@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/specialist.js') }}" defer></script>
@endpush
@section('content')

<div class="title-header">
    <h3>Specjalisci</h3>
    <div class="actions">
        <a href="{{route('specjalisci.create')}}" class="btn btn-primary"><i class="lni lni-plus"></i> Dodaj nowego specjaliste</a>
    </div>
</div>

@if (session('status'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session('status') }}
    </div>
@endif
<div class="box-wrapper">
    <div class="sub-title">Lista specjalistów</div>
    <table class="table ">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Imię i naziwsko</th>
            <th scope="col">Usługi</th>
            <th scope="col">Status</th>
            <th scope="col" style="text-align: center" colspan="2">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($specialists as $key => $specialist)
            <tr>
                <td scope="row">{{$specialist->id}}</td>
                <td>
                    <div style="display: flex; align-items: center">
                        <img src="{{Storage::url('files/shares/specjalisci/'.$specialist->photo)}}" width="50px">
                        <span style="margin-left: 15px">{{$specialist->name}}</span>
                    </div>
                </td>
                <td>

                    <div class="flex">
                        @if($specialist->services -> isEmpty())
                            <span class="badge badge-light">brak usługi</span>
                            @else
                                @foreach($specialist->services as $service)
                                    <span class="badge badge-primary">{{$service->name}}</span>
                                @endforeach
                        @endif
                    </div>
                </td>
                <td><select class="form-control change" data-attribute="status" data-id="{{$specialist->id}}" data-slug="{{$specialist->slug}}">
                        <option data-status="1" {{($specialist->status === 1 ? 'selected' : '')}}>Widoczny</option>
                        <option data-status="0" {{($specialist->status === 0 ? 'selected' : '')}}>Ukryty</option>
                    </select>
                </td>
                <td style="text-align: right">
                    <a href="{{route('specjalisci.edit', $specialist->id)}}"><i class="lni lni-pencil-alt"></i></a>
                </td>
                <td>
                    <i class="lni lni-more-alt" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                        <a class="dropdown-item" href="{{route('specjalisci.show', $specialist->id)}}">Zobacz</a>
                        <a class="dropdown-item" href="#" data-type="delete" data-id="{{$specialist->id}}" data-slug="{{$specialist->id}}">Usuń</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="table-action" style="display: flex; justify-content: flex-end; border-top: 1px solid #e3eef6; padding-top: 20px;">

    </div>

</div>


@endsection
