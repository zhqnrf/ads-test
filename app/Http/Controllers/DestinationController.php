<?php

namespace App\Http\Controllers;

use App\Models\Origin;
use App\Models\Origins;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $origins = Origins::all();
        return view('dashboard.destination.index', ['destinations' => $origins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.destination.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'origin_name' => 'required'
        ]);

        $origin = Origins::create($validated);

        return redirect()->route('destination.index')->with('status', 'success')->with('message', 'Data berhasil ditambah');
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
    public function edit(string $id)
    {
        $origin = Origins::find($id);

        return view('dashboard.destination.edit', ['origin' => $origin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $origin = Origins::find($id);
        $validated = $request->validate([
            'origin_name' => 'required'
        ]);

        $origin->update($validated);

        return redirect()->route('destination.index')->with('status', 'success')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $origin = Origins::find($id);

        $origin->delete();

        return back()->with('status', 'success')->with('message', 'Data berhasil dihapus');
    }
}
