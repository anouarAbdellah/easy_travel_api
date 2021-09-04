<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $with = ['city'];
    use HasFactory;
    public function city() {
        return $this->belongsTo(City::class);
    }
    public function trip() {
        return $this->belongsTo(Trip::class);
    }
}
