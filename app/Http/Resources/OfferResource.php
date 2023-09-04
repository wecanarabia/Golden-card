<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Auth;
use App\Models\Favorite;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $fav = false;
        // if(Auth::user()){
        // $favorite = Favorite::where('user_id',Auth::user()->id)->where('offer_id',$this->id)->first();
        //     if($favorite){
        //         $fav = true ;
        //     }
        // }


        return [

            'id' => $this->id,
            // 'is_favorite'=>$fav,
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
