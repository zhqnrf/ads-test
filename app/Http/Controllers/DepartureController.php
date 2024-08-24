<?php

namespace App\Http\Controllers;

use App\Models\Departures;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    public function index()
    {
        $departures = Departures::all();
        return view('dashboard.departure.index', ['departures' => $departures]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.departure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'departure_category' => 'required'
        ]);

        $departure = Departures::create($validated);

        return redirect()->route('departure.index')->with('status', 'success')->with('message', 'Data berhasil ditambah');
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
        $departure = Departures::find($id);

        return view('dashboard.departure.edit', ['departure' => $departure]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departure = Departures::find($id);
        $validated = $request->validate([
            'departure_category' => 'required'
        ]);

        $departure->update($validated);

        return redirect()->route('departure.index')->with('status', 'success')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departure = Departures::find($id);

        $departure->delete();

        return back()->with('status', 'success')->with('message', 'Data berhasil dihapus');
    }
}
