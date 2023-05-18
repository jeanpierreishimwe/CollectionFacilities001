<?php

namespace App\Http\Controllers\Admin;
use App\Models\Collectinalfacility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegiterCollectionalFacilitController extends Controller
{
    public function CollectionalFacilitiesIndex(){

        $facilities = Collectinalfacility::get();
        return response()->json($facilities);
    }

    public function CollectionalFacilityStore(Request $request){
        $facility = Collectinalfacility::create([
            'name' => $request->input('name'),
            'photo' => $request->input('photo'),
            'address' => $request->input('address'),
            'visit_days' => $request->input('visit_days'),
        ]);
        return response()->json($facility, 201);
    }

    public function CollextionalFacilityShow($id)
    {
        $facility = Collectinalfacility::findOrFail($id);
        return response()->json($facility);
    }

    public function CollectionalFacilityUpdate(Request $request, $id)
    {
        $facility = Collectinalfacility::findOrFail($id);
        $facility->update([
            'name' => $request->input('name'),
            'photo' => $request->input('photo'),
            'address' => $request->input('address'),
            'visit_days' => $request->input('visit_days'),
           
        ]);
        return response()->json($facility);


}

public function  CollectionalFacilityDestroy($id)
    {
        $facility = Collectinalfacility::findOrFail($id);
        $facility->delete();

        return response()->json(null, 204);
    }

}
