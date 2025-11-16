<?php

namespace App\Transformers;

use App\Models\Landlord\ScientificTitle;
use League\Fractal\TransformerAbstract;

class ScientificTitleTransformer extends TransformerAbstract
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
    public function transform(ScientificTitle $title)
    {
       return [
            'id' => $title->id,
            'name_ar' => $title->translate('ar')->name,
            'name_en' => $title->translate('en')->name,
            'created_at' => $title?->created_at,
        ];
    }
}
