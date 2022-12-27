<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('unit.add');
        } else {
            $save = Unit::Create([
                'base' => request()->base_unit,
                'blister_per_base' => request()->blister,
                'tablet_per_blister' => request()->tablet,
            ]);
            if ($save) {
                return redirect()->route('add_unit')->with('message', 'Add Unit successfully');
            }
        }
    }
}
