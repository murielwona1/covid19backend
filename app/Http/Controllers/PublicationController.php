<?php

namespace App\Http\Controllers;

use App\publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listePublicationParType($key,$type)
    {
        $publication = publication::join('type_publications', 'publications.type_id', '=', 'type_publications.id')
                                    ->where('type_publications.libelle_type', $type)
                                    ->offset($key)
                                    ->limit(3)
                                    ->get();

        return response()->json($publication);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function EnregistrerPublication(Request $request)
    {

        $request->validate([
            'libelle'=>'string',
            'description'=> 'string',
            'type_id'=>'required'
        ]);

        $publication = new publication;
        $publication->image = $request->image;
        $publication->videos = $request->videos;
        $publication->libelle = $request->libelle;
        $publication->description = $request->description;
        $publication->source = $request->source;
        $publication->type_id = $request->type_id;
        $publication->save();

        return response()->json(array('message' => 'Publication enregistrée avec succès', 'success' => true, 200));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function ModificationPublication(Request $request)
    {
        $request->validate([
            'image' => 'string',
            'videos' => 'string',
            'libelle' => 'string',
            'description' => 'string',
            'source' => 'string',
            'type_id' => 'required|string',
        ]);

        $publication = publication::find($request->input('id'));
        $publication->image = $request->image;
        $publication->videos = $request->videos;
        $publication->libelle = $request->libelle;
        $publication->description = $request->description;
        $publication->source = $request->source;
        $publication->type_id = $request->type_id;
        $publication->asve();

        return response()->json(array('message' => 'Publication modifiée avec succès', 'success' => true, 200));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function SuppressionPublication(Request $request)
    {
        $publication = publication::find($request->input('id'));
        $publication->delete();
        return response()->json(array('message' => 'Publication supprimée', 'success' => true, 200));
    }
}
