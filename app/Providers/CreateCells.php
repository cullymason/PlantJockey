<?php

namespace App\Providers;

use App\Models\Cell;
use App\Providers\TrayCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCells
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TrayCreated  $event
     * @return void
     */
    public function handle(TrayCreated $event)
    {

        $tray = $event->tray;
        $cells = collect();
        for($currentColumn= 0; $currentColumn < $tray->columns;$currentColumn++)
        {
            for($currentRow = 0; !($currentRow >= $tray->rows); $currentRow++)
            {
                $row = $currentRow+1;
                $cell = Cell::make([
                    'row'=>$row,
                    'column' => $currentColumn,
                ]);
                $cells->push($cell);

            }
        }
        $tray->cells()->saveMany($cells);
    }
}
