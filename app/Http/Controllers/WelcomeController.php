<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function hello()
    {
        return response()->json([
            'message' => 'Hello from the WelcomeController',
            'project' => 'E-commerce Store',
        ]);
    }

    public function greet($name)
    {
        return response()->json([
            'greeting' => "Hello, $name!",
            'from' => 'WelcomeController'
        ]);
    }
}