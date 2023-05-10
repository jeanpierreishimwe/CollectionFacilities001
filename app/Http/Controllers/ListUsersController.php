<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ListUsersController extends Controller
{
    //

      /**
    * @OA\Get(
    *      path="/api/diplayUsers",
    *      operationId="TittlesO",
    *      tags={"Authertications"},
    *      summary="display registered users",
    *      description="Description",
    *      @OA\Response(
    *          response=200,
    *          description="Successfully retreived the data",
    *       ),
    *     )
    */
    function listUsers(){
        return User::all();
    }
}
