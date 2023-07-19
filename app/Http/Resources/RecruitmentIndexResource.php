<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecruitmentIndexResource extends JsonResource
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
            'name' => $this->name,
            'strata' => $this->strata,
            'prodi' => $this->prodi,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'boarding_address' => $this->boarding_address,
            'home_address' => $this->home_address,
            'email' => $this->email,
            'phone' => $this->phone,
            'mbti' => $this->mbti,
            'motto' => $this->motto,
            'interest' => $this->interest,
            'division' => $this->division,
            'division' => $this->division,
            // 'experience' => $this->whenLoaded('experience'),
            // 'achivement' => $this->whenLoaded('achivement'),
            'created_at' => $this->created_at,
        ];
    }
}
