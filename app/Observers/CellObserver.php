<?php

namespace App\Observers;

use App\Jobs\SyncPlantToTray;
use App\Models\Cell;

class CellObserver
{

    public function saved(Cell $cell)
    {
        SyncPlantToTray::dispatch($cell->tray->id);
    }


}
