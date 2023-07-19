<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

	protected $guarded = [];

	public function recruitment()
    {
        return $this->hasMany(Recruitment::class);
    }
}
