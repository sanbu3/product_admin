<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function axios(Request $request)
    {
        $msg = 'axios';
        return response()->json($msg);
    }
}
