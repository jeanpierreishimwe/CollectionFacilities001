<?php

namespace App\Http\Controllers\Admin;
use App\Models\Inimate;
use App\Models\Collectinalfacility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterInimateController extends Controller
{

      /**
    * @OA\Post(
    *      path="/api/collectinalfacilities/{collectinalfacilityId}/inimates",
    *      operationId="inimate01",
    *      tags={"InimateRegister"},
    *      summary=" registration request",
    *      description="Description",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Response Message",
    *          @OA\JsonContent()
    *       ),
    *     )
    */
    public function StoreInimate(Request $request, $collectinalfacilityId)
    {
        $name = $request->input('name');
        $inimate = new Inimate();
        $inimate->name = $name;
        $inimate->collectinalfacility_id = $collectinalfacilityId;
        $inimate->save();
        return response()->json($inimate, 201);
    }
    public function UpdateInimate(Request $request, $collectinalfacilityId, $inimateId)
    {
        $name = $request->input('name');
        $inimate = Inimate::where('collectinalfacility_id', $collectinalfacilityId)
        ->where('id', $inimateId)->first();
    if (!$inimate) {
        // Inmate not found, return an error response
        return response()->json(['message' => 'Inmate not found.'], 404);
    };

    $inimate->name = $name;
    $inimate->save();

    }

    public function DestroyInimate($collectinalfacilityId, $inimateId)
    {
     
        $inimate = Inimate::where('collectinalfacility_id', $collectinalfacilityId)
            ->where('id', $inimateId)->first();
        if (!$inimate) {  
            return response()->json(['message' => 'Inmate not found.'], 404);
        }
        $inimate->delete();
        return response()->json(null, 204);
    }
    
}
