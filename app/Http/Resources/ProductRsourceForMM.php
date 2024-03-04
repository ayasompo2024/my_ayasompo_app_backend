<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRsourceForMM extends JsonResource
{

    public function toArray($request)
    {
        $groupedProperties = $this->properties->groupBy(function ($property) {
            return optional($property->type)->name_mm;
        });

        $propertiesArray = $groupedProperties->map(function ($properties, $type) {
            return [
                'name' => $type,
                'detail' => $properties->map(function ($property) {
                    return [
                        'title' => $property->title_mm,
                        'desc' => $property->desc_mm,
                    ];
                }),
            ];
        });

        $faqs = $this->faqs->map(function ($faq) {
            return [
                'title' => $faq->title_mm,
                'desc' => $faq->desc_mm,
            ];
        });

        return [
            'language' => 'MM',
            'order' => $this->sort,
            'id' => $this->id,
            'product_type' => $this->product_type,
            'thumbnail' => config('app.app_domain') . $this->thumbnail,

            'name' => $this->name_mm,
            'title' => $this->title_mm,
            'brief_description' => $this->brief_description_mm,
            'faqs' => $faqs,
            'properties' => $propertiesArray
        ];
    }
}
