<?php

namespace App\Http\Controllers;

class CodeController extends Controller
{
    public function getCode()
    {
        return response()->json(
            file_get_contents(resource_path("/views/templates/twoSelect.blade.php"))
        );
    }
}