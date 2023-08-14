<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
	use HasFactory;
	protected $primaryKey = 'id'; // Field ID yang digunakan sebagai primary key
	public $incrementing = false; // Tandai bahwa kolom ID bukanlah auto-incrementing
	protected $keyType = 'string';

	protected $guarded = [];

	public function recruitment()
	{
		return $this->hasMany(Recruitment::class);
	}
}
