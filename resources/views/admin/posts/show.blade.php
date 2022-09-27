@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>{{ $post->title }}</h1>
    </header>
    <div class="clearfix">
        @if($post->image)
        <figure class="float-left mr-3">
            <img src=" {{ $post->image }}" alt="{{ $post->slug }}">
        </figure>
        @endif
        <p> {{ $post->content }} </p>
        <div>
            <strong> Creato il: </strong> <time> {{ $post->created_at }}</time>
        </div>
        <div>
            <strong> Ultima modifica: </strong> <time> {{ $post->updated_at }}</time>
        </div>
    </div>
    <footer class="d-flex align-items-center justify-content-between">

        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-circle-left"> </i> Indietro ...
        </a>
        <form action="{{ route('admin.posts.destroy', $post->id )}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
                <i class="fa-solid fa-trash-can"></i> Elimina!
            </button>
        </form>
    </footer>

</div>
@endsection