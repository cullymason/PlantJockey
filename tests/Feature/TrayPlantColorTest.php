<?php


use App\Models\Cell;
use App\Models\Plant;
use App\Models\Tray;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('adding a plant to a cell should add it to the list of tray plant colors', function(){

    $plant = Plant::create([
       'name' => 'Carolina Reaper Pepper'
    ]);

    $tray = Tray::create([
        'name' => Tray::defaultTrayName(),
        'rows' => 1,
        'columns' => 1
    ]);

    $lastCell = $tray->cells->last();

    $lastCell->plant()->associate($plant);

    $lastCell->save();
    $lastCell->plant()->associate($plant);

    $lastCell->save();
    expect($tray->plants->count())->toEqual(1);
    expect($tray->plants->first()->id)->toEqual($plant->id);


});


test('removing a plant from a cell and is the last in the tray, plant should be removed from tray',function() {
    $tray = Tray::create([
        'name' => Tray::defaultTrayName(),
        'rows' => 1,
        'columns' => 3
    ]);

    $plant1 = Plant::factory()->create();
    $plant2 = Plant::factory()->create();

    $cell1 = Cell::find(1)->plant()->associate($plant1);
    $cell1->save();

    $cell2 = Cell::find(2)->plant()->associate($plant2);
    $cell2->save();

    $cell3 = Cell::find(3)->plant()->associate($plant2);
    $cell3->save();
    expect($tray->plants()->pluck('id')->toArray())->toBe([$plant1->id,$plant2->id]);

    $cell2->plant()->dissociate();
    $cell2->save();
    expect($tray->plants()->pluck('id')->toArray())->toBe([$plant1->id,$plant2->id]);

    $cell3->plant()->dissociate();
    $cell3->save();
    expect($tray->plants()->pluck('id')->toArray())->toBe([$plant1->id]);

})->group('TrayPlant');;
