<?php

namespace App\Models;

use App\Jobs\SyncPlantToTray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'row',
        'column',
        'tray_id',
        'plant_id',
        'planted_on',
        'germinated_on',
        'flowered_on'
    ];

    protected $appends = [
        'address'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'row' => 'integer',
        'tray_id' => 'integer',
        'plant_id' => 'integer',
        'planted_on' => 'date',
        'germinated_on' => 'date',
        'flowered_on' => 'date'
    ];


    public function tray()
    {
        return $this->belongsTo(\App\Models\Tray::class);
    }

    public function setColumnAttribute($value)
    {
        $column = $value;

        if(is_integer($value))
        {
            $column = num2alpha($value);

        }

        $this->attributes['column'] = $column;
    }
    public function getAddressAttribute()
    {
        return "{$this->column}{$this->row}";
    }
    public function getGerminationTimeAttribute()
    {
        return $this->planted_on->diffInDays($this->germinated_on);
    }
    public function plant()
    {
        return $this->belongsTo(\App\Models\Plant::class);
    }


}
