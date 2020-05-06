<?php

namespace App\Http\Controllers;

use App\projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{

    public function ListProjet()
    {
        $projet = projet::all();
        return response()->json($projet);
    }


    public function EnregistrerProjet(Request $request)
    {
        $request->validate([
            'libelle' => 'string',
            'description' => 'string',
            'type_id' => 'required'
        ]);

        $projet = new projet;
        $projet->image = $request->image;
        $projet->videos = $request->videos;
        $projet->libelle = $request->libelle;
        $projet->description = $request->description;
        $projet->save();

        return response()->json(array('message' => 'projet enregistrée avec succès', 'success' => true, 200));
    }


    public function ModifierProjet(Request $request)
    {
        $request->validate([
            'libelle' => 'string',
            'description' => 'string',
            'type_id' => 'required'
        ]);

        $projet = projet::find($request->input('id'));
        $projet->image = $request->image;
        $projet->videos = $request->videos;
        $projet->libelle = $request->libelle;
        $projet->description = $request->description;
        $projet->save();

        return response()->json(array('message' => 'projet enregistrée avec succès', 'success' => true, 200));
    }


    public function SupprimerProjet(Request $request)
    {
        $projet = projet::find($request->input('id'));
        $projet->delete();
        return response()->json(array('message' => 'projet supprimée avec success', 'success' => true, 200));
    }
}
