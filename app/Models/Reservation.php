<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public function start_point() {
        return $this->belongsTo(Point::class, 'start_point_id');
    }
    public function end_point() {
        return $this->belongsTo(Point::class, 'end_point_id');
    }
    public function trip() {
        return $this->belongsTo(Trip::class);
    }
}
