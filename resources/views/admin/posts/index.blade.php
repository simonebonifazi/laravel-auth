@extends('layouts.app')

@section('content')
<div class="container">

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
                <td> </td>
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