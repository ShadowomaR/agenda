<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index() {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function autosearch(Request $request) {
        //$msg = 'This is a simple message.'.$request->name;
        if($request->name) $msg = 'This is a simple message.'.$request->name;
        else if($request->nom) $msg = 'This is a simple message.'.$request->nom;
        return $msg;
    }
}
