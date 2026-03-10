<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aquarium;
use App\Models\AquariumType;

class AquariumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aquaria = Aquarium::with('types')->get();

        return view('pages.aquaria.index', ['aquaria' => $aquaria]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = AquariumType::all();
        return view('pages.aquaria.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'date' => 'required|date',
        ]);

        // $type = AquariumType::where('name', $data['type'])->get('id');

        Aquarium::create([
            'aquarium_type_id' => $data['type'],
            'name' => $data['name'],
            'created_at' => $data['date'],
        ]);

        return redirect('/aquaria')->with('success', 'Aquarium is toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aquarium $aquarium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aquarium $aquarium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aquarium $aquarium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aquarium $aquarium)
    {
        //
    }
}
