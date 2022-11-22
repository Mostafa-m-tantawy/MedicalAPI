<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'bloodPressureDiastole'=>$this->bloodPressureDiastole,
            'pulse'=>$this->pulse,
            'breathingRate'=>$this->breathingRate,
            'bodyTemperature'=>$this->bodyTemperature,

        ];
    }
}
