<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
	use HasFactory;
	protected $primaryKey = 'id'; // Field ID yang digunakan sebagai primary key
	public $incrementing = false; // Tandai bahwa kolom ID bukanlah auto-incrementing
	protected $keyType = 'string';
	protected $guarded = [];

	public function setNameAttribute($value)
	{
		$this->attributes['name'] = strtolower($value);
	}

	public function experience()
	{
		return $this->hasMany(Experience::class, 'recruitment_id');
	}
	public function achivement()
	{
		return $this->hasMany(Achivement::class, 'recruitment_id');
	}

	public function user()
	{
		return $this->hasMany(User::class);
	}
}
