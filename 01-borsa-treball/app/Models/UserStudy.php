<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStudy extends Model
{
    use HasFactory;

    protected $table = 'user_study';
    protected $fillable = ['promotion_year'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function study() {
        return $this->belongsTo(Study::class);
    }
}
