<?php

namespace App\Http\Controllers;

use App\type_publication;
use Illuminate\Http\Request;

class TypePublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListTypePublication()
    {
        $type = type_publication::all();
        return response()->json($type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function EnregistrerTypPublication(Request $request)
    {
        $request->validate([
            'libelle_type' => 'required|string',
        ]);

        $type_publication = new type_publication;
        $type_publication->libelle_type = $request->libelle_type;

        $type_publication->save();

        return response()->json(array('message' => 'type de publication enregistré avec succès', 'success' => true, 200));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\type_publication  $type_publication
     * @return \Illuminate\Http\Response
     */
    public function ModificationPublication(Request $request)
    {
        $request->validate([
            'libelle_type' => 'required|string',
        ]);

        $type_publication = type_publication::find($request->input('id'));
        $type_publication->libelle_type = $request->libelle_type;

        $type_publication->save();

        return response()->json(array('message' => 'type de publication modifié avec succès', 'success' => true, 200));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\type_publication  $type_publication
     * @return \Illuminate\Http\Response
     */
    public function SuppressionTypePublication(Request $request)
    {
        $type_publication = type_publication::find($request->input('id'));
        $type_publication->delete();
        return response()->json(array('message' => 'type de publication supprimé', 'success' => true, 200));
    }
}
