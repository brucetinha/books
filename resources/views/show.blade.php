@extends('templates.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 m-auto py-2 px-0">
                <a href="{{"/books"}}" title="Voltar">
                    <button class="btn btn-dark rounded-circle"><span class="material-icons pt-2 md-18">arrow_back_ios_new</span></button>
                </a>
            </div>

            <div class="col-12 col-md-8 m-auto py-4 px-md-4 px-2 bg-white">
                <h1 class="mb-4">Visualizar</h1>
                @php 
                    $user = $book->find($book->id)->relUsers;
                @endphp
                <p class="mb-1">Título: <strong>{{$book->title}}</strong></p>
                <p class="mb-1">Páginas: <strong>{{$book->pages}}</strong></p>
                <p class="mb-1">Preço: <strong>R$ {{$book->price}}</strong></p>
                <p class="mb-0">Autor: <strong>{{$user->name}}</strong></p>
            </div>
        </div>
    </div>

@endsection