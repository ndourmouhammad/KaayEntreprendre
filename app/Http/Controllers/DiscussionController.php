<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscussionRequest;
use App\Http\Requests\UpdateDiscussionRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discussions=Discussion::all();
        return response()->json($discussions);
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
    public function store(Request $request)
    {
        $validated= $request->validate([
            "libelle"=> "required|string|max:255",
            "contenu"=> "required|string",
        ]);
        $discussion=Discussion::create([
            "libelle"=> $validated["libelle"],
            "contenu"=> $validated["contenu"],
            "user_id"=> Auth::id(),
        ]);
        return response()->json($discussion,201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $discussion=Discussion::findOrFail($id);
        return response()->json($discussion,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discussion $discussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
      $discussion=Discussion::findOrFail($id);
      $validated=$request->validate([
        "libelle"=> "sometimes|string|max:255",
        "contenu"=>'sometimes|string' 

      ]);
      $discussion->update($validated) ;
      return response()->json($discussion,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $discussion=Discussion::findOrFail($id);
        $discussion->delete();
        return response()->json($discussion,200);
    }
    public function recherche(Request $request){
        $query=$request->input ('query');
        $discussion=Discussion::where('libelle',"%{$query}")->get();
        return response()->json($discussion,200);
    }
}
