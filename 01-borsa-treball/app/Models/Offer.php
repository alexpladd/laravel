<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offers';
    protected $fillable = ['id', 'title', 'description', 'experience', 'annual_salary', 'sent'];

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function studies() {
        return $this->belongsToMany(Study::class)->withTimestamps();
    }
}
