<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRsource extends JsonResource
{

    public function toArray($request)
    {
        $groupedProperties = $this->properties->groupBy(function ($property) {
            return $property->type->name;
        });

        $propertiesArray = $groupedProperties->map(function ($properties, $type) {
            return [
                'name' => $type,
                'detail' => $properties->map(function ($property) {
                    return [
                        'title' => $property->title,
                        'desc' => $property->desc,
                    ];
                }),
            ];
        });

        $faqs = $this->faqs->map(function ($faq) {
            return [
                'title' => $faq->title,
                'desc' => $faq->desc,
            ];
        });

        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'product_type' => $this->product_type,
            'thumbnail' => $this->thumbnail,
            'brief_description' => $this->brief_description,
            'faqs' => $faqs,
            'properties' => $propertiesArray->values()->all(),
        ];
    }
}