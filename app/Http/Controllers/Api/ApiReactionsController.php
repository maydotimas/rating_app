<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reactions;
use Illuminate\Http\Request;

class ApiReactionsController extends Controller
{
    // get all reactions
    public function index(){
        $reactions = Reactions::all();

        return Response(['status'=>'OK','details'=>$reactions], 200);
    }
}
