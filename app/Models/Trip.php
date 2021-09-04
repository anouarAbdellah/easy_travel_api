<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $with = ['points', 'driver', 'vehicle', 'user'];
    use HasFactory;
    public function points() {
        return $this->hasMany(Point::class);
    }
    public function reservations() {
        return $this->hasMany(Reservation::class, 'trip_id');
    }
    public function pointsIds() {
        return $this->points->pulk('id')->toArray();
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function driver() {
        return $this->belongsTo(Driver::class);
    }
    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
}
