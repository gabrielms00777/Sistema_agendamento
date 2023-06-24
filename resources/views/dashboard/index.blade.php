@extends('dashboard.template.main')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Bem vindo(a), {{ auth()->user()->name }}!</h2>
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
                                    <button type="button" class="btn btn-sm"><span
                                            class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- widgets -->
                    <div class="row my-4">
                        <div class="col-md-3">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="small text-muted mb-0">Valor no mês</p>
                                            <span class="h3 mb-0">R${{ number_format($values, 2, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div> <!-- /. card-body -->
                            </div> <!-- /. card -->
                        </div> <!-- /. col -->
                        <div class="col-md-3">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <small class="text-muted mb-1">Serviços feitos no mês</small>
                                            <h3 class="card-title mb-0">{{ $services }}</h3>
                                        </div>
                                    </div> <!-- /. row -->
                                </div> <!-- /. card-body -->
                            </div> <!-- /. card -->
                        </div> <!-- /. col -->
                        <div class="col-md-3">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <small class="text-muted mb-1">Profissionais Cadastrados</small>
                                            <h3 class="card-title mb-0">{{ $professionais }}</h3>
                                        </div>
                                    </div> <!-- /. row -->
                                </div> <!-- /. card-body -->
                            </div> <!-- /. card -->
                        </div> <!-- /. col -->
                        <div class="col-md-3">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <small class="text-muted mb-1">Total Clientes</small>
                                            <h3 class="card-title mb-0">{{ $clients }}</h3>
                                        </div>
                                    </div> <!-- /. row -->
                                </div> <!-- /. card-body -->
                            </div> <!-- /. card -->
                        </div> <!-- /. col -->
                    </div> <!-- end section -->
                    <div class="row justify-content-center">
                        <div class="col-12">
                            {{-- <h2 class="page-title">Basic table</h2> --}}
                            {{-- <p> Tables with built-in bootstrap styles </p> --}}
                            <div class="row">
                                <!-- simple table -->
                                <div class="col-md-12 my-4">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">Agendamentos para hoje!</h5>
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
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($scheduling as $schedule)
                                                        <tr>
                                                            <td>{{ $schedule->service->name }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($schedule->date)) }}</td>
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
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {{-- <nav aria-label="Table Paging" class="mb-0 text-muted">
                                                <ul class="pagination justify-content-center mb-0">
                                                    {{ $scheduling->links() }}
                                                </ul>
                                            </nav> --}}
                                        </div>
                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- .col-12 -->
                        </div> <!-- .row -->
                        {{-- <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow eq-card  mb-4">
                            <div class="card-header">
                                <strong>Region</strong>
                            </div>
                            <div class="card-body">
                                <div class="map-box my-5"
                                    style="position:relative; max-width: 320px; max-height: 200px; margin:0 auto;">
                                    <div id="dataMapUSA"></div>
                                </div>
                                <div class="row align-items-bottom my-2">
                                    <div class="col">
                                        <p class="mb-0">France</p>
                                        <span class="my-0 text-muted small">+10%</span>
                                    </div>
                                    <div class="col-auto text-right">
                                        <p class="mb-0">118</p>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center my-2">
                                    <div class="col">
                                        <p class="mb-0">Netherlands</p>
                                        <span class="my-0 text-muted small">+0.6%</span>
                                    </div>
                                    <div class="col-auto text-right">
                                        <p class="mb-0">1008</p>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center my-2">
                                    <div class="col">
                                        <p class="mb-0">Italy</p>
                                        <span class="my-0 text-muted small">+1.6%</span>
                                    </div>
                                    <div class="col-auto text-right">
                                        <p class="mb-0">67</p>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center my-2">
                                    <div class="col">
                                        <p class="mb-0">Spain</p>
                                        <span class="my-0 text-muted small">+118%</span>
                                    </div>
                                    <div class="col-auto text-right">
                                        <p class="mb-0">186</p>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col -->
                    <div class="col-md-4">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-header">
                                <strong class="card-title">Traffic</strong>
                                <a class="float-right small text-muted" href="#!">View all</a>
                            </div>
                            <div class="card-body">
                                <div class="chart-box mb-3" style="min-height:180px;">
                                    <div id="customAngle"></div>
                                </div> <!-- .col -->
                                <div class="mx-auto">
                                    <div class="row align-items-center mb-2">
                                        <div class="col">
                                            <p class="mb-0">Direct</p>
                                            <span class="my-0 text-muted small">+10%</span>
                                        </div>
                                        <div class="col-auto text-right">
                                            <p class="mb-0">218</p>
                                            <span class="dot dot-md bg-success"></span>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col">
                                            <p class="mb-0">Organic Search</p>
                                            <span class="my-0 text-muted small">+0.6%</span>
                                        </div>
                                        <div class="col-auto text-right">
                                            <p class="mb-0">1002</p>
                                            <span class="dot dot-md bg-warning"></span>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col">
                                            <p class="mb-0">Referral</p>
                                            <span class="my-0 text-muted small">+1.6%</span>
                                        </div>
                                        <div class="col-auto text-right">
                                            <p class="mb-0">67</p>
                                            <span class="dot dot-md bg-primary"></span>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="mb-0">Social</p>
                                            <span class="my-0 text-muted small">+118%</span>
                                        </div>
                                        <div class="col-auto text-right">
                                            <p class="mb-0">386</p>
                                            <span class="dot dot-md bg-secondary"></span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col-md -->
                    <div class="col-md-4">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-header">
                                <strong>Browsers</strong>
                            </div>
                            <div class="card-body">
                                <div class="chart-box mt-3 mb-5">
                                    <div id="radarChartWidget"></div>
                                </div> <!-- .col -->
                                <div class="mx-auto">
                                    <div class="row align-items-center my-2">
                                        <div class="col-6 col-xl-3 my-3">
                                            <span class="mb-0">Safari</span>
                                            <div class="progress my-2" style="height: 4px;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: 10%" aria-valuenow="10" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-xl-3 my-3 text-right">
                                            <span>118</span><br />
                                            <span class="my-0 text-muted small">+10%</span>
                                        </div>
                                        <div class="col-6 col-xl-3 my-3">
                                            <span class="mb-0">Chrome</span>
                                            <div class="progress my-2" style="height: 4px;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: 36%" aria-valuenow="36" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-xl-3 my-3 text-right">
                                            <span>1008</span><br />
                                            <span class="my-0 text-muted small">+36%</span>
                                        </div>
                                        <div class="col-6 col-xl-3 my-3">
                                            <span class="mb-0">Opera</span>
                                            <div class="progress my-2" style="height: 4px;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-xl-3 my-3 text-right">
                                            <span>67</span><br />
                                            <span class="my-0 text-muted small">+1.6%</span>
                                        </div>
                                        <div class="col-6 col-xl-3 my-3">
                                            <span class="mb-0">Edge</span>
                                            <div class="progress my-2" style="height: 4px;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-xl-3 my-3 text-right">
                                            <span>186</span><br />
                                            <span class="my-0 text-muted small">+118%</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col -->
                </div> --}}
                    </div> <!-- /.col -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group list-group-flush my-n3">
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-box fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Package has uploaded successfull</strong></small>
                                            <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                            <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-download fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Widgets are updated successfull</strong></small>
                                            <div class="my-0 text-muted small">Just create new layout Index, form,
                                                table</div>
                                            <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-inbox fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Notifications have been sent</strong></small>
                                            <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo
                                            </div>
                                            <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-link fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Link was attached to menu</strong></small>
                                            <div class="my-0 text-muted small">New layout has been attached to the menu
                                            </div>
                                            <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                        </div>
                                    </div>
                                </div> <!-- / .row -->
                            </div> <!-- / .list-group -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear
                                All</button>
                        </div>
                    </div>
                </div>
            </div>

    </main> <!-- main -->
@endsection
