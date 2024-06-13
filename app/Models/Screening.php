<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $table = 'screenings';

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
