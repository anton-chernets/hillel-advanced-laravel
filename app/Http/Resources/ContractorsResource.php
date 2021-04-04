<?php


namespace App\Http\Resources;


use App\Models\Contractor;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractorsResource extends JsonResource
{
    //TODO непонятно Resource это компановщик или декоратор?
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /* @var Contractor $contractor */
        $contractor = $this;

        return [
            'id' => $contractor->id,
            'name' => $contractor->name,
        ];
    }
}
