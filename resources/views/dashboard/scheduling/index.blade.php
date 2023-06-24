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
                                    <button type="button" class="btn btn-success">Agendar Consulta</button>
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
                                            <h5 class="card-title">Agendamentos</h5>
                                            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Serviço</th>
                                                        <th>Data</th>
                                                        <th>Horário</th>
                                                        <th>Profissional</th>
                                                        <th>Cliente</th>
                                                        <th>Status</th>
                                                        <th>Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($scheduling as $schedule)
                                                        <tr class="accordion-toggle collapsed" id="c-{{ $schedule->id }}"
                                                            data-toggle="collapse" data-parent="#c-{{ $schedule->id }}"
                                                            href="#collap-{{ $schedule->id }}">
                                                            <td>{{ $schedule->service->name }}</td>
                                                            <td>{{ $schedule->date }}</td>
                                                            <td>{{ $schedule->time }}</td>
                                                            <td>{{ $schedule->professional->user->name }}</td>
                                                            <td>{{ $schedule->client->user->name }}</td>
                                                            @if ($schedule->status == 'pending')
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">Pendente</span>
                                                                </td>
                                                            @elseif ($schedule->status == 'confirmed')
                                                                <td>
                                                                    <span
                                                                        class="badge badge-pill badge-success">Confirmado</span>
                                                                </td>
                                                            @elseif ($schedule->status == 'rejected')
                                                                <td>
                                                                    <span
                                                                        class="badge badge-pill badge-danger">Rejeitado</span>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <span
                                                                        class="badge badge-pill badge-info">Realizado</span>
                                                                </td>
                                                            @endif
                                                            </td>
                                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                    type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text-muted sr-only">Status</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <form action="{{ route('schedule.change') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="schedule"
                                                                            value="{{ $schedule->id }}">
                                                                        <input type="hidden" name="status"
                                                                            value="confirmed">
                                                                        <button class="dropdown-item"
                                                                            type="submit">Confirmado</button>
                                                                    </form>
                                                                    <form action="{{ route('schedule.change') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="schedule"
                                                                            value="{{ $schedule->id }}">
                                                                        <input type="hidden" name="status"
                                                                            value="rejected">
                                                                        <button class="dropdown-item"
                                                                            type="submit">Rejeitado</button>
                                                                    </form>
                                                                    <form action="{{ route('schedule.change') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="schedule"
                                                                            value="{{ $schedule->id }}">
                                                                        <input type="hidden" name="status"
                                                                            value="realized">
                                                                        <button class="dropdown-item"
                                                                            type="submit">Realizado</button>
                                                                    </form>
                                                                    <form action="{{ route('schedule.change') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="schedule"
                                                                            value="{{ $schedule->id }}">
                                                                        <input type="hidden" name="status"
                                                                            value="pending">
                                                                        <button class="dropdown-item"
                                                                            type="submit">Pendente</button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr id="collap-{{ $schedule->id }}"
                                                            class="collapse in p-3 bg-light">
                                                            <td colspan="8">
                                                                <dl class="row mb-0 mt-1">
                                                                    <dt class="col-sm-1">Valor</dt>
                                                                    <dd class="col-sm-3">OBS</dd>
                                                                    {{-- <dt class="col-sm-4"><a  href="https://wa.me/5516981294778?text=Ol%C3%A1+Nome%2C+posso+confirmar+sua+presen%C3%A7a+para+o+servi%C3%A7o%3A+{{ $schedule->service->name }}%2C+no+dia+XX%2FXX+as+XX%3AXX">Confirmar</a></dt> --}}
                                                                    <dt class="col-sm-4"><a  href="https://wa.me/5516981294778?text=Ol%C3%A1+Nome%2C+posso+confirmar+sua+presen%C3%A7a+para+o+servi%C3%A7o%3A+{{ $schedule->service->name }}%2C+no+dia+{{ $schedule->date }}+as+{{ $schedule->time }}">Confirmar</a></dt>
                                                                </dl>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <nav aria-label="Table Paging" class="mb-0 text-muted">
                                                <ul class="pagination justify-content-center mb-0">
                                                    {{ $scheduling->links() }}
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
