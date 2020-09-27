<?php

namespace App\Http\Controllers;

class CodeController extends Controller
{
    public function getCode()
    {
        return response()->json(
            ["code" => 1]
        );
    }
}