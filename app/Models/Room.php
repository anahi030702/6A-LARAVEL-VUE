<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function screenings()
{
    return $this->hasMany(Screening::class);
}

}
