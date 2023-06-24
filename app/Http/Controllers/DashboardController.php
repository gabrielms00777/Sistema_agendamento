<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Professional;
use App\Models\Scheduling;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        // $scheduling = Scheduling::query()->with(['service', 'professional'])
        //             ->where('date', date('Y-m-d'))
        //             ->latest()
        //             ->paginate(10);
        

        $scheduling = Scheduling::query();

        $services = $scheduling->where('status', 'realized')->count();

        $values = $scheduling->sum('value');

        // dd($values);
        $scheduling = $scheduling->with(['service', 'professional'])
                                    ->where('date', date('Y-m-d'))
                                    ->latest()
                                    ->paginate(10);
        
        // die;
        // dd($scheduling);
        return view('dashboard.index', [
            'scheduling' => $scheduling,
            'services' => $services,
            'values' => $values,
            'professionais' => Professional::query()->count(),
            'clients' => Client::query()->count(),
        ]);
    }
}
