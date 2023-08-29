<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date = today()->format('Y-m-d');
        return [

            'id'        => $this->id,
            'first_name'      => $this->first_name,
            'last_name'   => $this->last_name,
            'email'     => $this->email,
            'code'     => $this->code,
            'phone'     => (string)$this->phone,
            'lat'=> $this?->lat,
            'long'=> $this?->long,
            'favorites_count'=>$this?->favcount?->count(),
            'saving'=> $this?->offers?->sum('discount_value'),
            'offers_count'=> $this?->offers?->count(),
            'last_sub' =>(string)$this?->subscriptions?->last()?->end_date ,
            'is_sub' => ( $this?->subscriptions->where('end_date', '>=', $date)->count() ) > 0 ? true : false ,

        ];
    }
}
