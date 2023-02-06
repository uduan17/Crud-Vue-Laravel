<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lend;


class LendController extends Controller
{
    public function createLend(Request $request)
    {
        $lend = new Lend($request->all());
        $lend->save();
        return response()->json(['lend' => $lend], 201);
    }
}
