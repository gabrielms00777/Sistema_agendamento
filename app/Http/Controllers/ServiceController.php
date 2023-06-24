<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->latest('status')->paginate(10);
        return view('dashboard.service.index', [
            'services' => $services
        ]);
    }

    public function create()
    {
        $categories = Category::query()->latest()->get();
        return view('dashboard.service.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'status' => 'required|boolean',
            'name' => 'required|string|max:255',
            'time' => 'required|date_format:H:i',
            'value' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'description' => 'required|string|max:255'
        ]);
        $service = Service::query()->create($data);
        if($service){
            return to_route('service.index')->with('success', 'Sucesso ao cadastrar serviço!');
        }
        return back()->withErrors('Erro ao cadastrar Serviço');
    }

    public function edit(Service $service)
    {
        // dd($service->with('category')->get());
        $categories = Category::query()->latest()->get();
        return view('dashboard.service.edit', [
            'service' => $service->with('category')->first(),
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'status' => 'required|boolean',
            'name' => 'required|string|max:255',
            'time' => 'required|date_format:H:i',
            'value' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'description' => 'required|string|max:255'
        ]);

        if($service->update($data)){
            return to_route('service.index');
        }
        //colocar erro

    }
}
