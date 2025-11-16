<?php

namespace App\Transformers;

use App\Models\Landlord\ScientificDegree;
use League\Fractal\TransformerAbstract;

class ScientificDegreeTransformer extends TransformerAbstract
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
    public function transform(ScientificDegree $degree )
    {
        return [
              'id' => $degree->id,
            'name_ar' => $degree->translate('ar')->name,
            'name_en' => $degree->translate('en')->name,
        ];
    }
}
