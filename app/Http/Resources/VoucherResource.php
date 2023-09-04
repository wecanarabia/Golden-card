<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
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
        'code' => $this->code,
        'date_of_use' => $this->created_at,
        // 'user'=>$this->user->id,
        // 'advertisement'=>$this->advertisement->id,
        'user'=>new UserResource($this->user),
        'offer'=>new OfferResource($this->offer),
        'branch'=>new BranchResource($this->branch),

        ];
    }
}
