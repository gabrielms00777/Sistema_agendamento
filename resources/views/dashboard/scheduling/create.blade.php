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
                            <h2 class="h3 mb-0 page-title">Agendar Consulta</h2>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary">Agendar</button>
                        </div>
                    </div>
                    <form action="{{route('schedule.store')}}" method="POST">
                        @csrf
                        <hr class="my-4">
                        {{-- <div class="alert alert-danger" role="alert">
                            <span class="fe fe-alert-octagon fe-16 mr-2"></span> A simple secondary alert—check it out!
                        </div> --}}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="client_id">Cliente</label>
                                <select class="form-control select2" id="client_id" name="client_id">
                                    <option value="">-- Selecione --</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="service">Selecione um Serviço</label>
                                <select id="service" class="form-control" name="service_id">
                                    <option value="">-- Selecione --</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="professional">Selecione um profissional</label>
                                <select id="professional" class="form-control" name="professional_id">
                                    <option value="">-- Selecione --</option>
                                    @foreach ($professionais as $professional)
                                        <option value="{{ $professional->id }}">{{ $professional->user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="date">Data</label>
                                <div class="input-group">
                                    <input type="date" class="form-control drgpicker" id="date"
                                        aria-describedby="date" name="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="time">Hora</label>
                                <input class="form-control" id="time" type="time" name="time" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="value">Valor</label>
                                <input class="form-control" id="value" type="text" name="value" placeholder="Ex: R$100.00" required>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="form-row">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Agendar</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
    @push('scripts')
        {{-- <script src='{{ asset('admin/js/select2.min.js') }}'></script> --}}
        {{-- <script>
            $('#service').change(function(e) {
                e.preventDefault();
                const service = e.target.value
                $.ajax({
                    type: "GET",
                    url: 'http://localhost:8000/dashboard/service/value',
                    data: service,
                    // dataType: "dataType",
                    success: function(response) {
                        console.log(response)
                    }
                });
            });
        </script> --}}
        <script>
            $('.select2').select2({
                theme: 'bootstrap4',
            });
            $('.drgpicker').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                showDropdowns: true,
                minYear: 2023,
                locale: {
                    format: 'MM/DD/YYYY'
                }
            });
        </script>
    @endpush
@endsection
