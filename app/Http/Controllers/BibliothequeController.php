<?php

namespace App\Http\Controllers;

use App\bibliotheque;
use Illuminate\Http\Request;

class BibliothequeController extends Controller
{

    public function listeBibiothequeParType($key,$type)
    {
        $bibliotheque = bibliotheque::where('type',$type)->offset($key)->limit(3)->get();

        return response()->json($bibliotheque);
    }

    public function EnregistrerBibiotheque(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'icon' => 'string',
            'url' => 'string',
            'type' => 'required',
        ]);

        $bibliotheque = new bibliotheque;
        $bibliotheque->titre = $request->titre;
        $bibliotheque->icon = $request->icon;
        $bibliotheque->url = $request->url;
        $bibliotheque->type = $request->type;
        $bibliotheque->save();

        return response()->json(array('message' => 'bibliotheque enregistrée avec succès', 'success' => true, 200));
    }
}
