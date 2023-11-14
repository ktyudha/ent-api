<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotulensiResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		return parent::toArray($request);
		// return [
		// 	'uuid' => $this->id,
		// 	'dst_url' => $this->dst_url,
		// 	'short_url' => $this->short_url,
		// 	'created_at' => $this->created_at,
		// ];
	}
}
