<?php

namespace App\Http\Controllers;

use App\volontaire;
use Illuminate\Http\Request;

class VolontaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListeVolontaire()
    {
        $volontaire = volontaire::join('expertises', 'volontaires.expertise_id', '=', 'expertises.id')->get();
        return response()->json($volontaire);
    }

    public function listVolontaireExpertise($expertise){
        $volontaire = volontaire::join('expertises', 'volontaires.expertise_id', '=', 'expertises.id')
                                ->where('expertises.libelle_expertise', $expertise)
                                ->get();
        return response()->json($volontaire);
    }

    public function EnregistrerVolontaire(Request $request)
    {
        $request->validate([
                'expertise_id'=>'required',
                'noms'=>'required',
                'couriel'=>'required',
        ]);

        $volontaire = new volontaire;
        $volontaire->expertise_id = $request->expertise_id;
        $volontaire->noms = $request->noms;
        $volontaire->prenon = $request->prenon;
        $volontaire->couriel = $request->couriel;
        $volontaire->photo = $request->photo;
        $volontaire->reference = $request->reference;

        $volontaire->save();

        return response()->json(array('message' => 'volontaire enregistré avec succès', 'success' => true, 200));
    }

    public function update(Request $request)
    {

    }

    public function SupprimerVolontaire(Request $request)
    {
        $volontaire = volontaire::find($request->input('id'));
        $volontaire->delete();
        return response()->json(array('message' => 'volontaire supprimé avec success', 'success' => true, 200));
    }

    public function telechargerImage(Request $request)
    {
        if ($request->hasFile('photo')) {

            $files = $request->file('photo');
            $request->image->move('storage/', $files->getClientOriginalName());
            return response()->json(array('message' => 'photo upload success', 'success' => true, 200));
        }
        return response()->json(array('message' => 'photo upload error', 'success' => false, 401));
    }

    public function telechargerReference(Request $request)
    {
        if ($request->hasFile('reference')) {

            $files = $request->file('reference');
            $request->image->move('storage/', $files->getClientOriginalName());
            return response()->json(array('message' => 'reference upload success', 'success' => true, 200));
        }
        return response()->json(array('message' => 'reference upload error','success' => false, 401));
    }
}
