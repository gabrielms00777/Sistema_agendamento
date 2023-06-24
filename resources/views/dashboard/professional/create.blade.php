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
                    @enderror
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">Cadastrar Profissional</h2>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-success">Ver Profissionais</button>
                        </div>
                    </div>
                    <form action="{{route('professional.store')}}" method="POST">
                        @csrf
                        <hr class="my-4">
                        {{-- <h5 class="mb-2 mt-4">Personal</h5>
            <p class="mb-4">Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus</p> --}}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="whatsapp">Whatsapp</label>
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="">Serviços que atende</label>
                                @foreach ($services as $service)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="service_id[]" value="{{$service->id}}" class="custom-control-input" id="{{$service->name}}">
                                        <label class="custom-control-label" for="{{$service->name}}">{{$service->name}}</label>
                                    </div>
                                @endforeach
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
    @push('scripts')
    @endpush
@endsection
