@extends('dashboard.template.main')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">Cadastrar Serviço</h2>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary">Agendar</button>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('service.store') }}">
                        @csrf
                        <hr class="my-4">
                        {{-- <h5 class="mb-2 mt-4">Personal</h5>
            <p class="mb-4">Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus</p> --}}
                        <div class="form-row">
                            <div class="col-md-6">
                                <label class="">Status</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="active" name="status" value="1"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label" for="active">Ativo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="inative" name="status" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="inative">Inativo</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Nome do Serviço">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="time">Tempo de execução</label>
                                <input class="form-control" id="time" type="time" name="time">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="category">Categoria</label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value="">-- Selecione --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="value">Valor</label>
                                <input type="text" id="value" name="value" class="form-control"
                                    placeholder="Ex:R$ 100.00">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="example-textarea">Descrição</label>
                                <textarea class="form-control" placeholder="Uma breve descrição do serviço" name="description" id="example-textarea"
                                    rows="4"></textarea>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="form-row">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
@endsection
