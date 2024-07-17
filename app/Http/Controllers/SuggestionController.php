<?php

namespace App\Http\Controllers;

use App\Models\Suggestions;

use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function create(Request $request) {

        Suggestions::create([
            'name' => $request->name,
            'suggestions' => $request->suggestion
        ]);

        return response()->json(['Error' => 0, 'Message' => 'Your suggestion has been submitted successfully']);
    }
}
