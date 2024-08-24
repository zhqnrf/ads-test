<?php

namespace App\Http\Controllers;

use App\Models\Departures;
use App\Models\Origins;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::get();

        return view('dashboard.travel.index', ['travels' => $travels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $origins = Origins::all();
        $departures = Departures::all();
        return view('dashboard.travel.create', ['departures' => $departures, 'origins' => $origins]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'travel_name' => 'required|string|max:255',
            'travel_price' => 'required|numeric',
            'travel_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_origin' => 'required',
            'id_destination' => 'required',
            'id_departure' => 'required'
        ]);

        if ($request->hasFile('travel_picture')) {
            $file = $request->file('travel_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('travel_pictures', $fileName, 'public');

            $validated['travel_picture'] = 'storage/' . $filePath;
        }

        $travel = Travel::create($validated);

        return redirect()->route('travels.index')->with('status', 'success')->with('message', 'Berhasil menambahkan data');
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
        $travel = Travel::find($id);
        $origins = Origins::all();
        $departures = Departures::all();

        return view('dashboard.travel.edit', ['travel' => $travel, 'departures' => $departures, 'origins' => $origins]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'travel_name' => 'required|string|max:255',
            'travel_price' => 'required|numeric',
            'travel_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_origin' => 'required',
            'id_destination' => 'required',
            'id_departure' => 'required'
        ]);

        $travel = Travel::find($id);

        if ($request->hasFile('travel_picture')) {
            $file = $request->file('travel_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('travel_pictures', $fileName, 'public');

            $validated['travel_picture'] = 'storage/' . $filePath;
        } else {
            unset($validated['travel_picture']);
        }

        $travel->update($validated);

        return redirect()->route('travel.index')->with('status', 'success')->with('message', 'Berhasil mengubah data');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $travel = Travel::find($id);
        $travel->delete();

        return back()->with('status', 'success')->with('message', 'Berhasil dihapus');
    }
}
