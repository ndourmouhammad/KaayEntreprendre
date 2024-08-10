<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuideRequest;
use App\Http\Requests\UpdateGuideRequest;
use App\Models\Guide;
use Illuminate\Http\JsonResponse;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Guide::all(), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuideRequest $request)
    {
        $request->validate([

            'titre' => 'required|string|max:255',
            'contenu' => 'required|text'
        ]);

        Guide::create($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(Guide $guide)
    {
        if (!$guide) {

            return response()->json(['message'=>'guide non trouvé'],404);
        }
        return $guide;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuideRequest $request, Guide $guide)
    {
        $request->validate([

            'titre' => 'required|string|max:255',
            'contenu' => 'required|text'
        ]);


        $guide->update($request->all());

        if (!$guide) {

            return response()->json(['message'=>'guide non trouvé'],404);
        }

        return $guide;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();

        if (!$guide) {

            return response()->json(['message'=>'guide non trouvé'],404);
        }

        return $guide;
    }
}
