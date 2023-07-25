<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $guarded = [];

	public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
	public function achivement()
    {
        return $this->belongsTo(Achivement::class);
    }

	public function user()
    {
        return $this->hasMany(User::class);
    }
}
