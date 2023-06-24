<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    public function index()
    {
        $professionais = Professional::query()->with('user')->latest('status')->paginate(10);
        return view('dashboard.professional.index', [
            'professionais' => $professionais
        ]);
    }

    public function create()
    {
        $services = Service::query()->where('status', true)->get(['id', 'name']);
        // dd($services);
        return view('dashboard.professional.create', [
            'services' => $services
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users,email',
            'phone' => 'required|numeric',
            'whatsapp' => 'required|numeric',
            'service_id' => 'required|array',
        ]);
        // dd($data['service_id']);
        $data['password'] = 'password';
        
        $user = User::query()->create($data);
        $professional = Professional::query()->create(['user_id' => $user->id]);
        foreach ($data['service_id'] as $service) {
            $professional->services()->attach($service);
        }
        if($user && $professional){

            return to_route('professional.index');
        }

    }

    public function edit(Professional $professional)
    {
        $services = Service::query()->get(['id', 'name']);

        $professional = $professional->with('services:id,name')->first();

        // if($professional->services->id)
        // dd($professional->services->id);
        return view('dashboard.professional.edit', [
            'professional' => $professional,
            'services' => $services,
        ]);
    }

    public function update(Request $request, Professional $professional)
    {
        $data = $request->validate([
            'status' => 'required|boolean',
            'email' => 'required|string|max:255|email|unique:users,email,email,id'
        ]);

        if($professional->update($data)){
            return to_route('professional.index');
        }
        //colocar erro

    }
}
