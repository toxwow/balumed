@extends('layouts.admin')
@push('js')
    <script src="{{ asset('js/admin/blog.js') }}" defer></script>
@endpush
@section('content')

<div class="title-header">
    <h3>Blog</h3>
    <div class="actions">
        <a href="{{route('blog.create')}}" class="btn btn-primary"><i class="lni lni-plus"></i> Dodaj nowy wpis</a>
    </div>
</div>
@if (session('status'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session('status') }}
    </div>
@endif
<div class="box-wrapper">
    <div class="sub-title">Lista wpisów</div>
    <table class="table ">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tytuł</th>
            <th scope="col">Tagi</th>
            <th scope="col">Data dodania</th>
            <th scope="col">Status</th>
            <th scope="col" style="text-align: center" colspan="2">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $key => $blog)
            <tr>
                <td scope="row">{{$blog->id}}</td>
                <td>{{$blog->title}}</td>
                <td>
                    <div class="flex">
                        @if($blog->tags->isEmpty())
                            <span class="badge badge-light">brak tagu</span>
                        @else
                            @foreach($blog->tags as $tag)
                                <span class="badge badge-primary">{{$tag->name}}</span>
                            @endforeach
                        @endif
                    </div>
                </td>
                <td>{{Carbon\Carbon::parse($blog->created_at)->format('Y-m-d, G:i:s')}}</td>
                <td><select class="form-control change" data-attribute="status" data-id="{{$blog->id}}" data-slug="{{$blog->slug}}">
                        <option data-status="1" {{($blog->status === 1 ? 'selected' : '')}}>Widoczny</option>
                        <option data-status="2" {{($blog->status === 2 ? 'selected' : '')}}>Zaarchizowany</option>
                        <option data-status="0" {{($blog->status === 0 ? 'selected' : '')}}>Ukryty</option>
                    </select>
                </td>
                <td style="text-align: right">
                    <a href="{{route('blog.edit', $blog->id)}}"><i class="lni lni-pencil-alt"></i></a>
                </td>
                <td>
                    <i class="lni lni-more-alt" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                        <a class="dropdown-item" href="{{route('blog.show', $blog->slug)}}">Zobacz</a>
                        <a class="dropdown-item" href="#" data-type="delete" data-id="{{$blog->id}}" data-slug="{{$blog->slug}}">Usuń</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="table-action" style="display: flex; justify-content: flex-end; border-top: 1px solid #e3eef6; padding-top: 20px;">
        {{ $blogs->links() }}
    </div>
</div>

@endsection
