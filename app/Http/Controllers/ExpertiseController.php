<?php

namespace App\Http\Controllers;

use App\expertise;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{

    public function ListeExpertise()
    {
        $expertise = expertise::all();
        return response()->json($expertise);
    }

    public function EnregitrerExpertise(Request $request)
    {
        $request->validate([
            'libelle_expertise' => 'required|string',
        ]);

        $expertise = new expertise;
        $expertise->libelle_expertise = $request->libelle_expertise;

        $expertise->save();

        return response()->json(array('message' => 'expertise enregistrée avec succès', 'success' => true, 200));
    }


    public function ModifierExpertise(Request $request)
    {
        $request->validate([
            'libelle_zone' => 'required|string',
        ]);

        $expertise = expertise::find($request->input('id'));
        $expertise->libelle_expertise = $request->libelle_expertise;

        $expertise->save();

        return response()->json(array('message' => 'expertise modifiée avec succès', 'success' => true, 200));
    }

    public function SupprimerExpertise(Request $request)
    {
        $expertise = expertise::find($request->input('id'));
        $expertise->delete();
        return response()->json(array('message' => 'expertise supprimée avec success', 'success' => true, 200));
    }

}
