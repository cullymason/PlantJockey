<?php

namespace App\Console\Commands;

use App\Models\Cell;
use App\Models\Tray;
use Illuminate\Console\Command;

class buildTrayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build:tray
    {rows? : number of rows}
    {columns? : number of columns}
    {--name= : name of the tray}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates tray for a given size';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rows = $this->argument('rows');
        if(!$this->argument('rows'))
        {
            $rows = $this->ask('How many rows does the tray have?',1);
        }
        $columns = $this->argument('columns');
        if(!$this->argument('columns'))
        {
            $columns = $this->ask('How many columns does the tray have?',1);
        }

        $name=$this->option('name');
        if(!$this->option('name'))
        {
            $totalTrays = Tray::count()+1;
            $name = $this->ask('What do you want to name the tray','Tray'.$totalTrays);
        }

        $this->alert("Building new tray with {$rows} rows and {$columns} columns named {$name}.");
        $this->newLine();
        $tray = Tray::create([
            'name' => $name,
            'rows' => $rows,
            'columns' => $columns
        ]);
        $cells = collect();
        for($currentColumn= 0; $currentColumn <= $columns;$currentColumn++)
        {
            $this->line("<fg=green>Building column</> {$this->num2alpha($currentColumn)}");
            for($currentRow = 1; $currentRow <= $rows; $currentRow++)
            {
                $this->line("- <fg=cyan>Building cell:</> {$this->num2alpha($currentColumn)}{$currentRow}");

                $cell = Cell::make([
                    'row'=>$currentRow,
                    'column' => $currentColumn,
                ]);
                $cells->push($cell);

            }
            $this->newLine();
        }

        $tray->cells()->saveMany($cells);

        $this->line('done.');
    }

    private function num2alpha($n)
    {
        $r = '';
        for ($i = 1; $n >= 0 && $i < 10; $i++) {
            $r = chr(0x41 + ($n % pow(26, $i) / pow(26, $i - 1))) . $r;
            $n -= pow(26, $i);
        }
        return $r;
    }
}
