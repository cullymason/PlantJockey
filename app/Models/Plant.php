<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function cells()
    {
        return $this->hasMany(\App\Models\Cell::class);
    }

    public function trays()
    {
        return $this->belongstoMany(Tray::class)->withPivot('color');
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
