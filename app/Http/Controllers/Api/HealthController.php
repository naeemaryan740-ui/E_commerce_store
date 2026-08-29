<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class HealthController extends Controller
{
    public function ping()
    {
        return response()->json([
            'message' => 'API is working',
            'project' => 'E-commerce Store',
        ]);
    }
}