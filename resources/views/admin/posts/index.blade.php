@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('message'))
    <div class="alert alert-{{ session('type') ?? 'info' }}">
        {{ session('message')}}
    </div>
    @endif
    <header>
        <h2> I tuoi post </h2>
    </header>


    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
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
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                    <a href="{{ route('admin.posts.show' , $post ) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa-solid fa-eye fa-3x"> Vedi</i>
                    </a>
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
</div>
@endsection