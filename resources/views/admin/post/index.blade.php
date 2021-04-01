@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/post.js') }}" defer></script>
@endpush
@section('content')

<div class="title-header">
    <h3>Aktualności</h3>
    <div class="actions">
        <a href="{{route('aktualnosci.create')}}" class="btn btn-primary"><i class="lni lni-plus"></i> Dodaj nowy post</a>
    </div>
</div>
@if (session('status'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session('status') }}
    </div>
@endif
<div class="box-wrapper">
    <div class="sub-title">Lista aktualności</div>
    <table class="table ">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tytuł</th>
            <th scope="col">Tagi</th>
            <th scope="col">Data dodania</th>
            <th scope="col">Status</th>
            <th scope="col">Typ</th>
            <th scope="col" style="text-align: center" colspan="2">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <td scope="row">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>
                    <div class="flex">
                        @if($post->tags->isEmpty())
                            <span class="badge badge-light">brak tagu</span>
                        @else
                            @foreach($post->tags as $tag)
                                <span class="badge badge-primary">{{$tag->name}}</span>
                            @endforeach
                        @endif
                    </div>
                </td>
                <td>{{Carbon\Carbon::parse($post->created_at)->format('Y-m-d, G:i:s')}}</td>
                <td><select class=" form-control change" data-attribute="status" data-id="{{$post->id}}" data-slug="{{$post->slug}}">
                        <option data-status="1" {{($post->status === 1 ? 'selected' : '')}}>Widoczny</option>
                        <option data-status="0" {{($post->status === 0 ? 'selected' : '')}}>Ukryty</option>
                    </select>
                </td>
                <td><select class="select-to-check form-control change-type" data-attribute="type" data-id="{{$post->id}}" data-slug="{{$post->slug}}">
                        <option data-type="1" {{($post->type === 1 ? 'selected' : '')}}>Modal</option>
                        <option data-type="0" {{($post->type === 0 ? 'selected' : '')}}>Domyślny</option>
                    </select>
                </td>
                <td style="text-align: right">
                    <a href="{{route('aktualnosci.edit', $post->id)}}"><i class="lni lni-pencil-alt"></i></a>
                </td>
                <td>
                    <i class="lni lni-more-alt" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                        <a class="dropdown-item" href="{{route('aktualnosci.show', $post->slug)}}">Zobacz</a>
                        @csrf
                        <a class="dropdown-item" href="#" data-type="delete" data-id="{{$post->id}}" data-slug="{{$post->slug}}">Usuń</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="table-action" style="display: flex; justify-content: flex-end; border-top: 1px solid #e3eef6; padding-top: 20px;">
        {{ $posts->links() }}
    </div>
</div>

@endsection
