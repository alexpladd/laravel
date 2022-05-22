<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $table = 'studies';
    protected $fillable = ['id', 'name', 'duration', 'description'];

    public function offers() {
        return $this->belongsToMany(Offer::class)->withTimestamps();
    }

    public function userStudy() {
        return $this->hasMany(UserStudy::class);
    }
}
