<?php

namespace App\Transformers;

use App\Models\Landlord\VisitType;
use League\Fractal\TransformerAbstract;

class VisitTypeTransformer extends TransformerAbstract
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
    public function transform(VisitType $visitType)
    {
         return [
            'id' => $visitType->id,
            'name_ar' => $visitType->translate('ar')->name,
            'name_en' => $visitType->translate('en')->name,
            'created_at' => $visitType?->created_at,
        ];
    }
}
