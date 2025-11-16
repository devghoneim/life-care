<?php

namespace App\Transformers;

use App\Models\Landlord\Specialty;
use League\Fractal\TransformerAbstract;

class SpecialtyTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Specialty $specialty)
    {
         return [
            'id' => $specialty->id,
            'name_ar' => $specialty->translate('ar')->name,
            'name_en' => $specialty->translate('en')->name,
            'image_url' => $specialty->getFirstMediaUrl('image'),
            'department' => [
                'id' => $specialty->department->id,
                'name' => $specialty->department->name,
            ],
            'created_at' => $specialty?->created_at,
        ];
    }
}
