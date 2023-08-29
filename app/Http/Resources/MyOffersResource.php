<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyOffersResource extends JsonResource
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
            'code'=>Voucher::where('offer_id', $this->id)->where('user_id',Auth::user()->id)->code,
            'name' => $this->name,
            'description' => $this->description,
            'discount_value'=> $this->discount_value,
            'discount_text'=> $this->discount_text,
            'image' => $this->image,
            'status' => $this->status,
            'end_date' => $this->end_date,
            'use_times' => $this->use_times,
            // 'sum_uses'=> Voucher::where('offer_id', $this->id)->count(),
            'service_id' => $this->service?->id,
            'service_name' => $this->service?->name,
            'branches' => BranchResource::collection($this?->branches),


        ];
    }
}
