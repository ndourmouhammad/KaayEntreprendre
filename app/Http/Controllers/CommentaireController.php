<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;
use App\Models\Commentaire;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($discussionId)
    {
        //
        $commentaires=Commentaire::where("discussion_id", $discussionId)->get();
        return response()->json($commentaires);
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
    public function store(Request $request, $discussionId)
    {
        $validator=Validator::make($request->all(), [
            "contenu"=> "required|string",
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=> $validator->errors()],422);
        }
        $commentaires=Commentaire::create([
            'discussion_id'=>$discussionId,
            'user_id'=> Auth::id(),
            'contenu'=> $request->contenu,
        ]);
        return response()->json($commentaires,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $commentaire=Commentaire::findOrFail($id);
        if($commentaire->user_id != Auth::id()){
            return response()->json(["error"=>"Unauthorized"],403);
        }
        $validator=Validator::make($request->all(), [
            "contenu"=> "required|string",
        ]);
        if ($validator->fails()) {
            return response()->json(["errors"=> $validator->errors()],422);
        }

        $commentaire->update($request->only("contenu"));
        return response()->json($commentaire,200);

    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commentaires=Commentaire::findOrFail($id);
        if($commentaires->user_id != Auth::id()){
            return response()->json(["error"=> "Unauthorized"],403);
        }
        $commentaires->delete();
        return response()->json(['message'=>'commentaire supprimer avec succé'],200);
    }
}
