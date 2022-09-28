@extends('layouts.app')

@section('content')



<header>
    <h2> I tuoi post </h2>
</header>


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Slug</th>
            <th scope="col">Categoria:</th>
            <th scope="col">Creato alle:</th>
            <th scope="col">Ultima modifica:</th>
            <th scope="col">Azioni ... </th>
        </tr>
    </thead>
    <tbody>
        @forelse($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>
                @if($post->category_id)
                {{ $post->category->label }}
                @else
                Non inserita
                @endif
            </td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td class="d-flex align-items-center justify-content-around">
                <a href="{{ route('admin.posts.show' , $post ) }}" class="btn btn-sm btn-outline-primary p-2">
                    <i class="fa-solid fa-eye"> </i> Vedi ...
                </a>
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary p-2">
                    <i class="fa-solid fa-file-pen"></i> Modifica
                </a>

                <form action="{{ route('admin.posts.destroy', $post->id )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fa-solid fa-trash-can"></i> Elimina!
                    </button>
                    <!-- TODO conferma utente  -->
                </form>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">
                <h4 class="text-center">

                    Ancora nessun post
                </h4>
            </td>
        </tr>
        @endforelse

    </tbody>
</table>
<footer class="d-flex flex-end">
    <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-success p-2">
        <i class="fa-solid fa-circle-plus"></i> Nuovo post
    </a>
</footer>

@endsection