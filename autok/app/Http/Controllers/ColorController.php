<?php

namespace App\Http\Controllers;
use App\Http\Traits\ValidationRules;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    use ValidationRules;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodies = Color::all();
        // return view('colors/list', compact('colors'));
        return view('fuels/list', ['entities' => Color::all()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createColor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->getNameValidationRules());
        $color = new Color();
        $color->name = $request->input('name');
        $color->save();

        return redirect()->route('colors')->with('success', "{$color->name} sikeresen létrehozva");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = Color::find($id);
        return view('editColor', compact('Color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->getNameValidationRules());
        $color = Color::find($id);
        $color->name = $request->input('name');
        $color->save();

        return redirect()->route('colors')->with('success', "{$color->name} sikeresen módosítva");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::find($id);
        $color->delete();

        return redirect()->route('colors.list')->with('success', "Sikeresen törölve");
    }
}
