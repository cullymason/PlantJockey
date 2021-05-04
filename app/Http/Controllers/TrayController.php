<?php

namespace App\Http\Controllers;

use App\Models\Tray;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class TrayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $trays = auth()->user()->trays;

        return view('trays.index')->with(['trays'=>$trays]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create',Tray::class);
        $tray =Tray::make([
            'name'=> $request->name,
            'rows' => $request->rows,
            'columns' => $request->columns
        ]);

        $tray->owner()->associate(auth()->user());

        $tray->save();

        return redirect()->route('trays.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tray  $tray
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Tray $tray)
    {
        $this->authorize('view',$tray);
        return view('trays.show')->with(['tray'=>$tray]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tray  $tray
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tray  $tray
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tray $tray)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tray  $tray
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tray $tray): \Illuminate\Http\RedirectResponse
    { 
        $tray->cells()->each(function($cell){
            optional($cell->plant())->dissociate();
           $cell->save();
           $cell->delete();
        });
        $tray->plants()->detach();
        $tray->save();
        $tray->delete();
        return redirect()->route('trays.index');
    }
}
