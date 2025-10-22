<?php

namespace App\Http\Controllers;

use App\Models\Ocene;
use Illuminate\Http\Request;

class OceneController extends Controller
{
    public function addGrade(Request $request)
    {
        $request->validate([
            'profesor' => 'string|required',
            'predmet' => 'string|required',
            'ocena' => 'int|required|min:1|max:5',
        ]);
            Ocene::create([
                'profesor' => $request->get(key: 'profesor'),
                'predmet' => $request->get(key: 'predmet'),
                'ocena' => $request->get(key: 'ocena'),
                'user_id' => 1,
            ]);
        return redirect('/');

    }
}
