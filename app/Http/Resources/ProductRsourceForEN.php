<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRsourceForEN extends JsonResource
{

    public function toArray($request)
    {
        $groupedProperties = $this->properties->groupBy(function ($property) {
            return optional($property->type)->name;
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

        // $imagePath = public_path($this->thumbnail);
        // $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        return [
            'language' => 'EN',
            'order' => $this->sort,
            'id' => $this->id,
            'product_type' => $this->product_type,
            'thumbnail' => $this->thumbnail,

            'name' => $this->name,
            'title' => $this->title,
            'brief_description' => $this->brief_description,
            'faqs' => $faqs,
            'properties' => $propertiesArray->values()->all(),
        ];
    }
}
