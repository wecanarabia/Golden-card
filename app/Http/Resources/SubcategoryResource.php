<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
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
            'image' => $this->image,
            'parent_id' => $this->parent_id,
            'category_name' => $this->parentcategory?->name,
            'services' => ServiceResource::collection($this->services),
            // 'parent' => $this->parent ? new CategoryResource($this->parent) : null,


        ];



}
}
