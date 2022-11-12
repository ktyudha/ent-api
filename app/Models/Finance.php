<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
	use HasFactory, HasUuids;

	protected $fillable = [
		'date',
		'description',
		'amount',
		'type',
		'balance',
	];
}
