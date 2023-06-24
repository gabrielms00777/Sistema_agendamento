@extends('dashboard.template.main')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Welcome!</h2>
                        </div>
                        <div class="col-auto">
                            <form class="form-inline">
                                <div class="form-group d-none d-lg-inline">
                                    <label for="reportrange" class="sr-only">Date Ranges</label>
                                    <div id="reportrange" class="px-2 py-2 text-muted">
                                        <span class="small"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('service.create') }}" class="btn btn-success">Cadastrar
                                        Serviço</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            {{-- <h2 class="page-title">Basic table</h2> --}}
                            {{-- <p> Tables with built-in bootstrap styles </p> --}}
                            <div class="row">
                                <!-- simple table -->
                                <div class="col-md-12 my-4">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">Todos os Serviços</h5>
                                            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Serviço</th>
                                                        <th>Tempo</th>
                                                        <th>Valor</th>
                                                        <th>Editar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($services as $service)
                                                        <tr>
                                                            <td>{{ $service->name }}</td>
                                                            <td>{{ $service->time }}</td>
                                                            <td>R$ {{ number_format($service->value, 2, ',', '.') }}</td>
                                                            <td><a href="{{ route('service.edit', $service->id) }}"><i class="fe fe-edit fe-16"></i> Editar</a></td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td>Nehum serviço cadastrado.</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <nav aria-label="Table Paging" class="mb-0 text-muted">
                                                <ul class="pagination justify-content-center mb-0">
                                                    {{ $services->links() }}
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- .col-12 -->
                        </div> <!-- .row -->
                    </div> <!-- /.col -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->

    </main> <!-- main -->
@endsection
