<?php

namespace App\Models;

use App\Listeners\TrayCreated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tray extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'rows',
        'columns',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rows' => 'integer',
        'columns' => 'integer',
    ];


    public function cells()
    {
        return $this->hasMany(\App\Models\Cell::class);
    }

    public function plants()
    {
        return $this->belongsToMany(Plant::class)->withPivot('color');
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function setNameAttribute($value)
    {
        $name = $value;

        if(!$value)
        {
            $name = self::defaultTrayName();
        }

        $this->attributes['name'] = $name;
    }

    public static function defaultTrayName()
    {
        $count = self::count()+1;

        return "Tray_{$count}";
    }

    protected $dispatchesEvents = [
        'created' => \App\Providers\TrayCreated::class,

    ];
}
