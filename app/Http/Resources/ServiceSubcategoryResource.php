<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceSubcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id'=>$this->id,
            'service_id'=>$this->service?->id,
            'subcategory_id'=>$this->subcategory?->id,
            // 'service'=>new ServiceResource($this->service),
            // 'subcategory'=>new SubcategoryResource($this->subcategory)
        ]

        ;
    }
}
