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
                <h1 class="mb-4">
                    @if(isset($book))
                        Editar
                    @else
                        Cadastrar
                    @endif
                </h1>

                @if(isset($errors) && count($errors)>0)
                    <div class="text-center alert-danger py-4 mb-4">
                        @foreach ($errors->all() as $erro)
                            {{$erro}}
                        @endforeach
                    </div>
                @endif

                @if(isset($book)) <!-- NOTE: EDIT -->
                    <form name="form-edit" id="form-edit" method="post" action="{{url("books/$book->id")}}">
                        @method('PUT')
                @else <!-- NOTE: CREATE -->
                    <form name="form-create" id="form-create" method="post" action="{{url('books')}}">
                @endif

                    @csrf
                    <label for="title" class="mb-0">Título do livro</label>
                    <input type="text" value="{{$book->title ?? ''}}" class="form-control mb-2" name="title" id="title" placeholder="Título do livro" required>
                    
                    <label for="id_user" class="mb-0">Autor</label>
                    <select name="id_user" id="id_user" class="form-control mb-2" required>
                        <option value="">Selecione o autor</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" 
                                @if(isset($book->relUsers->id) && $book->relUsers->id == $user->id) 
                                    selected
                                @endif
                            >{{$user->name}}</option>
                        @endforeach
                    </select>

                    <label for="pages" class="mb-0">N° páginas</label>
                    <input type="number" value="{{$book->pages ?? ''}}" step="1" min="1" class="form-control mb-2" name="pages" id="pages" placeholder="Páginas do livro" required>
                    
                    <label for="price" class="mb-0">Preço</label>
                    <input type="text" value="{{$book->price ?? ''}}" class="form-control mb-4" name="price" id="price" placeholder="Preço do livro" required>
                    
                    <div class="text-right">
                        <button class="btn btn-success" type="submit" name="submit" title="Salvar"><span class="material-icons pt-2 md-18">done</span></button>
                    </div>

                </form>
                
            </div>
        </div>
    </div>

@endsection