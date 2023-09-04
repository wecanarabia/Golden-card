<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromocodeResource extends JsonResource
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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'code' => $this->code,
            'num_of_users' => $this->num_of_users,
            'status' => $this->status,
            'type' => $this->type,
            'value' => $this->value,

        ];
    }
}
