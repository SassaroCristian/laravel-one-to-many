<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaravelAuthModel;

class LaravelAuthModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni tutti i progetti dal database
        $posts = posts::all();

        // Restituisci la vista della dashboard con i dati dei progetti
        return view('admin.dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostra il form per creare un nuovo elemento
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaravelAuthModelRequest $request)
    {
        // Validazione dei dati del form
        $validatedData = $request->validated();

        // Crea un nuovo elemento nel database utilizzando i dati validati
        LaravelAuthModel::create($validatedData);

        // Reindirizza l'utente alla pagina degli elenchi dei progetti
        return redirect()->route('admin.posts.index')->with('success', 'posts created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaravelAuthModel $laravelAuthModel)
    {
        // Mostra i dettagli dell'elemento specificato
        return view('admin.posts.show', compact('laravelAuthModel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaravelAuthModel $laravelAuthModel)
    {
        // Mostra il form per modificare l'elemento specificato
        return view('admin.posts.edit', compact('laravelAuthModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaravelAuthModelRequest $request, LaravelAuthModel $laravelAuthModel)
    {
        // Validazione dei dati del form
        $validatedData = $request->validated();

        // Aggiorna l'elemento nel database utilizzando i dati validati
        $laravelAuthModel->update($validatedData);

        // Reindirizza l'utente alla pagina degli elenchi dei progetti
        return redirect()->route('admin.posts.index')->with('success', 'post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaravelAuthModel $laravelAuthModel)
    {
        // Elimina l'elemento specificato dal database
        $laravelAuthModel->delete();

        // Reindirizza l'utente alla pagina degli elenchi dei progetti
        return redirect()->route('admin.posts.index')->with('success', 'posts deleted successfully.');
    }
}
