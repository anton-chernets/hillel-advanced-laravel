<?php


namespace App\Http\Resources;


use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /* @var Order $order */
        $order = $this;

        return [
            'id' => $order->id,
            'id_products' => $order->id_products,
            'contractor_id' => $order->contractor_id,
            'sum' => $order->sum,
        ];
    }

}
