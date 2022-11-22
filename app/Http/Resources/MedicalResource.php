<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalResource extends JsonResource
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
            'id'=>$this->id,
            'timestamp'=>Carbon::parse($this->created_at)->timestamp,
            "userId"=> $this->user->id,
            "userName"=> $this->user->name,
            "userDob"=> $this->user->dob,
            'diagnosis'=>new DignosisResource($this->diagnosis),
            'vital'=>new VitalResource($this->vital),
            'meta'=>new MetaResource($this->meta),
            'doctor'=>new DoctorResource($this->doctor),

        ];
    }
}
