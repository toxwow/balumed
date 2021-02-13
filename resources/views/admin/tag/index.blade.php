@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/tag.js') }}" defer></script>
@endpush
@section('content')

<div class="title-header">
    <h3>Tagi</h3>
    <div class="actions">
        <a href="{{route('tagi.create')}}" class="btn btn-primary"><i class="lni lni-plus"></i> Dodaj nowy tag</a>
    </div>
</div>
@if (session('status'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session('status') }}
    </div>
@endif
<div class="two-boxs">
    <div class="box-wrapper">
        <div class="sub-title">Lista tagów bloga</div>
        <table class="table ">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Slug</th>
                <th scope="col" colspan="2" style="text-align: center">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                @if($tag->type == 0)
                    <tr>
                        <td scope="row">{{$tag->id}}</td>
                        <td scope="row">{{$tag->name}}</td>
                        <td scope="row">{{$tag->slug}}</td>
                        <td style="text-align: right">
                            <a href="{{route('tagi.edit', $tag->id)}}"><i class="lni lni-pencil-alt"></i></a>
                        </td>
                        <td ><a href="#" data-type="delete" data-id="{{$tag->id}}" data-slug="{{$tag->slug}}"><i class="lni lni-trash"></i></a></td>

                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-wrapper">
        <div class="sub-title">Lista tagów aktualności</div>
        <table class="table ">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Slug</th>
                <th scope="col" colspan="2" style="text-align: center" >Akcje</th>
            </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    @if($tag->type == 1)
                        <tr>
                            <td scope="row">{{$tag->id}}</td>
                            <td scope="row">{{$tag->name}}</td>
                            <td scope="row">{{$tag->slug}}</td>
                            <td style="text-align: right">
                                <a href="{{route('tagi.edit', $tag->id)}}"><i class="lni lni-pencil-alt"></i></a>
                            </td>
                            <td >
                                @csrf
                                <a href="#" data-type="delete" data-id="{{$tag->id}}" data-slug="{{$tag->slug}}"><i class="lni lni-trash"></i></a></td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
