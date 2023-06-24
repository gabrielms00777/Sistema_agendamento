<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->latest('status')->paginate(10);
        return view('dashboard.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'required|boolean',
            'name' => 'required|string|max:200',
        ]);

        Category::query()->create($data);

        return to_route('category.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'status' => 'required|boolean',
            'name' => 'required|string|max:200',
        ]);

        if($category->update($data)){
            return to_route('category.index')->with('success', 'Categoria atualizada com sucesso!');
        }
        //colocar erro

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd($category->with('services')->find($category->id)->services->count() == 0);
        if($category->with('services')->find($category->id)->services->count() == 0){
            $category->delete();
            return to_route('category.index')->with('success', 'Categoria deletada com sucesso!');
        }else{
            // dd('else');
            return back()->withErrors('Não é possivel deletar uma categoria com serviços cadastrados!');
        }

        return back()->withErrors('Não foi possivel deletar a categoria!');

    }
}
