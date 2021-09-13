@extends('templates.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 m-auto py-4 px-md-4 px-2 bg-white">
                <h1>Crud</h1>

                <div class="text-right py-2">
                    <a href="{{"books/create"}}" title="Adicionar">
                        <button class="btn btn-success"><span class="material-icons pt-2 md-18">add</span></button>
                    </a>
                </div>

                @csrf
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Título</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($book as $bk)
                        @php
                            $user = $bk->find($bk->id)->relUsers;
                        @endphp
                            <tr>
                                <th scope="row" class="align-middle">{{$bk->id}}</th>
                                <td class="align-middle">{{$bk->title}}</td>
                                <td class="align-middle">{{$user->name}}</td>
                                <td class="align-middle">{{$bk->price}}</td>
                                <td class="col-md-3">
                                    <a href="{{"books/$bk->id"}}" title="Visualizar">
                                        <button class="btn btn-dark"><span class="material-icons pt-2 md-18">visibility</span></button>
                                    </a>

                                    <a href="{{"books/$bk->id/edit"}}" title="Editar">
                                        <button class="btn btn-primary"><span class="material-icons pt-2 md-18">mode_edit</span></button>
                                    </a>

                                    <a href="{{"books/$bk->id"}}" class="delete-button" title="Excluir">
                                        <button class="btn btn-danger"><span class="material-icons pt-2 md-18">delete</span></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection