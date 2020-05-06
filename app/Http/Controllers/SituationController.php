<?php

namespace App\Http\Controllers;

use App\situation;
use Illuminate\Http\Request;

class SituationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function situationParZone($zone,$date)
    {
        $situation = situation::where([['zone_id', $zone],['horodatage',$date]])->get();
        return response()->json($situation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function EnregistrerSituation(Request $request)
    {
        $request->validate([
            'nbr_personne_test' => 'required',
            'nbr_personne_confine' => 'required',
            'nbr_personne_hospitalise' => 'required',
            'nbr_personne_guerie' => 'required',
            'nbr_personne_mort' => 'required',
            'horodatage' => 'required',
            'zone_id' => 'required',
        ]);

        $situation = new situation;
        $situation->nbr_personne_test = $request->nbr_personne_test;
        $situation->nbr_personne_confine = $request->nbr_personne_confine;
        $situation->nbr_personne_hospitalise = $request->nbr_personne_hospitalise;
        $situation->nbr_personne_guerie = $request->nbr_personne_guerie;
        $situation->nbr_personne_mort = $request->nbr_personne_mort;
        $situation->horodatage = $request->horodatage;
        $situation->zone_id = $request->zone_id;
        $situation->asve();

        return response()->json(array('message' => 'situation enregistrée avec success', 'success' => true, 200));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\situation  $situation
     * @return \Illuminate\Http\Response
     */
    public function ModificationSituation(Request $request)
    {
        $request->validate([
            'nbr_personne_test' => 'required',
            'nbr_personne_confine' => 'required',
            'nbr_personne_hospitalise' => 'required',
            'nbr_personne_guerie' => 'required',
            'nbr_personne_mort' => 'required',
            'horodatage' => 'required',
            'zone_id' => 'required',
        ]);

        $situation = situation::find($request->input('id'));
        $situation->nbr_personne_test = $request->nbr_personne_test;
        $situation->nbr_personne_confine = $request->nbr_personne_confine;
        $situation->nbr_personne_hospitalise = $request->nbr_personne_hospitalise;
        $situation->nbr_personne_guerie = $request->nbr_personne_guerie;
        $situation->nbr_personne_mort = $request->nbr_personne_mort;
        $situation->horodatage = $request->horodatage;
        $situation->zone_id = $request->zone_id;
        $situation->asve();

        return response()->json(array('message' => 'situation modifiée avec success', 'success' => true, 200));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\situation  $situation
     * @return \Illuminate\Http\Response
     */
    public function SuppressionSituation(Request $request)
    {
        $situation = situation::find($request->input('id'));
        $situation->delete();
        return response()->json(array('message' => 'situation supprimée avec success', 'success' => true, 200));
    }
}
