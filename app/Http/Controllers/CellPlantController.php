<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use App\Models\Plant;
use Illuminate\Http\Request;

class CellPlantController extends Controller
{
    public function create(Cell $cell, Request $request)
    {
        $plant = Plant::findOrFail($request->plant_id);
        $cell->plant()->associate($plant);
        $cell->save();
        return redirect()->route('cells.show',$cell);
    }

    public function delete(Cell $cell)
    {
        $cell->plant()->dissociate();
        $cell->save();
        return back();
    }
}
