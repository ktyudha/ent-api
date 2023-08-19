<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		// return parent::toArray($request);
		return [
			'date' => $this->date,
			'title' => $this->title,
			'achievement' => $this->achievement,
			'level' => $this->level
		];
	}
}
