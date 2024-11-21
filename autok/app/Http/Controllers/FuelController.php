<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuelRequest;
use App\Models\Fuel;


class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $fuels = Fuel::all();
        return view('fuels.index', ['entities' => Fuel::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fuels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FuelRequest $request)
    {
        Fuel::create($request->validated());

        return redirect()->route('fuels.index')->with('success', 'Fuel created successfully');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $entity = Fuel::find($id);
        return view('fuels.edit', ['entity' => $entity]);
        // return view('fuels.edit', compact($entity));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FuelRequest $request, string $id)
    {
        $fuel = Fuel::find($id);
        $fuel->update($request->validated());
        // $validatedrequest = $request->validated();
        // $fuel->name = $validatedrequest->input('name');
        // $fuel->save();

        return redirect()->route('fuels.index')->with('success', "Fuel updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuel = Fuel::find($id);
        $fuel->delete();

        return redirect()->route('fuels.index')->with('success', "Fuel deleted successfully");
    }
}


