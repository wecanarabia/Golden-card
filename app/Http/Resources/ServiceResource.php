<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'logo'=> $this->logo,
            'description' => $this->description,
            'phone' => $this->phone,
            'code' => $this->code,
            'images' => ImageServiceResource::collection($this->images),
            // 'subcategory_id' => $this->subcategory?->id,
            // 'subcategory_name' => $this->subcategory?->name,
            'branches' => BranchResource::collection($this->branches),
            'offers' => OfferResource::collection($this->offers),

        ];
    }
}
