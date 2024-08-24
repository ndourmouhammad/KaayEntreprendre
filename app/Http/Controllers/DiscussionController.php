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
        $discussions = Discussion::with('user:id,name,photo')->get();
        
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
    $discussion = Discussion::where('id', $id)
        ->with([
            'user:id,name,photo', // Include user details
            'commentaires' => function ($query) {
                $query->select('id', 'contenu', 'user_id', 'discussion_id', 'created_at', 'updated_at')
                      ->with('user:id,name'); // Include user details for comments
            }
        ])
        ->first();

    return response()->json($discussion, 200);
}

public function comments($id)
{
    $discussion = Discussion::with('commentaires')->find($id); // Notez 'commentaires' ici

    if (!$discussion) {
        return response()->json(['message' => 'Discussion not found'], 404);
    }

    $commentaires = $discussion->commentaires; // Utilisez 'commentaires' ici

    return response()->json(['message' => 'Comments retrieved successfully', 'data' => $commentaires]);
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
