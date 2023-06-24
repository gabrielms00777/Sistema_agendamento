<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Professional;
use App\Models\Scheduling;
use App\Models\Service;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SchedulingController extends Controller
{
    public function index()
    {
        $scheduling = Scheduling::query()->with(['client','service', 'professional'])->orderBy('date', 'desc')->paginate(10);
        // dd($scheduling);
        return view('dashboard.scheduling.index', [
            'scheduling' => $scheduling
        ]);
    }

    public function create()
    {
        $professionais = Professional::query()->with('user')->get(['id', 'user_id']);
        $clients = Client::query()->with('user')->get(['id', 'user_id']);
        // dd($professionais);
        $services = Service::query()->where('status', true)->get(['id', 'name']);
        return view('dashboard.scheduling.create', [
            'professionais' => $professionais,
            'services' => $services,
            'clients' => $clients,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'professional_id' => 'required|exists:professionals,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'value' => 'required|numeric',
        ]);

        $dateTime = $data['date'].' '.$data['time'];
        // dd($dateTime, date('Y-m-d H:i'));
        if($dateTime <= date('Y-m-d H:i')){
            dd('nao pode data anterior');
        }
        
        $scheduling = Scheduling::query()->create($data);

        if($scheduling){
            return to_route('schedule.index');
        }

    }

    public function change(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'schedule' => 'required|exists:schedulings,id',
            'status' => ['required', Rule::in(['confirmed','pending','rejected','realized'])],
        ]);
        $schedule = Scheduling::query()->findOrFail($data['schedule']);
        $schedule->update(['status' => $data['status']]);
        return to_route('schedule.index');
    }
}
