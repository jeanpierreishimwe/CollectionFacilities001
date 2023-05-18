<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterInimateController extends Controller
{
    public function store(Request $request, $collectinalfacilityId)
    {
        $data = $request->only('name');
        $data['collectinalfacility_id'] = $collectinalfacilityId;

        $inimate = Inimate::create($data);

        return response()->json($inimate, 201);
    }
    public function update(Request $request, $collectinalfacilityId, $inimateId)
    {
        $data = $request->only('name');

        $inimate = Inimate::where('collectinalfacility_id', $collectinalfacilityId)
            ->findOrFail($inimateId);

        $inimate->update($data);

        return response()->json($inimate);
    }

    public function destroy($collectinalfacilityId, $inimateId)
    {
        $inimate = Inimate::where('collectinalfacility_id', $collectinalfacilityId)
            ->findOrFail($inimateId);

        $inimate->delete();

        return response()->json(null, 204);
    }
    
}
