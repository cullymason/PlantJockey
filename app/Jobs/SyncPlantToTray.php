<?php

namespace App\Jobs;

use App\Models\Plant;
use App\Models\Tray;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncPlantToTray implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Plant
     */
    public $plant;
    public $tray;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tray_id)
    {
        $this->tray = Tray::findOrFail($tray_id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ids = $this->tray->cells()->pluck('plant_id');
        $this->tray->plants()->sync($ids->whereNotNull());
        $this->tray->save();
    }
}
