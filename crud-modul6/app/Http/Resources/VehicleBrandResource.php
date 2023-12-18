<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleBrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "brand" => $this->brand,
            "lama_sewa" => $this->lama_sewa,
            "harga_sewa" => $this->harga_sewa,
            "category_id" => $this->category_id,
            "customer_id" => $this->customer_id

        ];
    }
}
