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
                            <h2 class="h3 mb-0 page-title">Cadastrar Categoria</h2>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary">Agendar</button>
                        </div>
                    </div>
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <hr class="my-4">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label class="">Status</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="active" name="status" value="1" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="active">Ativo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="inative" name="status" value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="inative">Inativo</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control">
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
