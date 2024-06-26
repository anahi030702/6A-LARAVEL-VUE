<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinemas';

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

}
