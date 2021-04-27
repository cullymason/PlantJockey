<?php
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);
test('creating a tray also creates the correct number of cells', function() {
    $tray = \App\Models\Tray::create([
        'name' => \App\Models\Tray::defaultTrayName(),
        'rows' => 10,
        'columns' => 6
    ]);
    expect($tray->cells()->count())->toEqual(60);


});
