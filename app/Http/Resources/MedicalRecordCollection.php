<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicalRecordCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data'=> MedicalResource::collection($this->collection),
            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'page' => $this->currentPage(),
            'total_pages' => $this->lastPage()
        ];
    }

}
