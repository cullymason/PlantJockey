<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use App\Models\Plant;
use Illuminate\Http\Request;

class CellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cell  $cell
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Cell $cell)
    {
        $this->authorize('view',$cell);
        $plants = auth()->user()->plants;
        return view('cells.show')->with(['cell'=>$cell,'plants'=>$plants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function edit(Cell $cell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cell $cell)
    {
        $this->authorize('update',$cell);
        $cell->update([
           'planted_on' => $request->planted_on,
           'germinated_on' => $request->germinated_on,
           'flowered_on' => $request->flowered_on
        ]);
        $cell->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cell $cell)
    {
        //
    }
}
