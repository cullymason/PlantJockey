<?php
use Laravel\Dusk\Browser;

it('displays the bottom right cell', function () {
    $tray = \App\Models\Tray::create([
        'name' => \App\Models\Tray::defaultTrayName(),
        'rows' => 10,
        'columns' => 6
    ]);
    $this->browse(function (Browser $browser) use ($tray) {
        $browser->visit("/trays/{$tray->id}")
            ->assertSee('F10');
    });
});
