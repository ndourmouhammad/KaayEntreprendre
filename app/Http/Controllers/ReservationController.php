<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class ReservationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations= Reservation::where('user_id', auth::id())->get();
      return response()->json($reservations);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request)
    {
        $validated= $request->validate([
            'evenement_id'=> 'required|exists:evenements,id',
            'status'=> 'nullable|in:en_attente,accepte,refuse',
        ]);
      $validated['user_id']=auth::id();
      
      $reservation= Reservation::create($validated);
      return response()->json([$reservation,201]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $reservation= Reservation::findOrFail($id);
        $this->authorize('view', $reservation);
        return response()->json($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $reservation= Reservation::findOrFail($id);
        $this->authorize('update', $reservation);
        $validated=$request->validate([
           'evenement_id'=> 'required|exists:evenements,id',
            'status'=> 'nullable|in:en_attente,accepte,refuse', 
        ]);
        $reservation->update();
        return response()->json([$reservation,201]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation= Reservation::findOrFail($id);
        $this->authorize('delete',$reservation);
        $reservation->delete();
        return response()->json([],204);
    }
}
