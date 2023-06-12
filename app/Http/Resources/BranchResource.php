<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{

    public function __construct($resource, $distance = null)
    {
        $this->distance = $distance;

        parent::__construct($resource);
    }
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
            'lat' => $this->lat,
            'long' => $this->long,
            'distance' => $this->when(isset($this->distance), $this->distance),
            'location' => $this->location,
            'area_id' => $this->area?->id,
            'area_name' => $this->area?->name,
            'service_id' => $this?->service?->id,
            'service_name' => $this?->service?->name,
            'service_logo' => $this?->service?->logo,

        ];
      }
}
