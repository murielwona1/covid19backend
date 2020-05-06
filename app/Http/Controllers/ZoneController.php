<?php

namespace App\Http\Controllers;

use App\zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListeZone()
    {
        $zone = zone::all();
        return response()->json($zone);
    }

    public function EnregistrerZone(Request $request)
    {
        $request->validate([
            'libelle_zone' => 'required|string',
        ]);

        $zone = new zone;
        $zone->libelle_zone = $request->libelle_zone;

        $zone->save();

        return response()->json(array('message' => 'zone enregistrée avec succès', 'success' => true, 200));
    }


    public function ModificationZone(Request $request)
    {
        $request->validate([
            'libelle_zone' => 'required|string',
        ]);

        $zone = zone::find($request->input('id'));
        $zone->libelle_zone = $request->libelle_zone;

        $zone->save();

        return response()->json(array('message' => 'zone modifiée avec succès', 'success' => true, 200));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function SuppressionZone(Request $request)
    {
        $zone = zone::find($request->input('id'));
        $zone->delete();
        return response()->json(array('message' => 'zone supprimée avec success', 'success' => true, 200));
    }
}
