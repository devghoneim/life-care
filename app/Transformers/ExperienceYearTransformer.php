<?php

namespace App\Transformers;

use App\Models\Landlord\ExperienceYear;

use League\Fractal\TransformerAbstract;

class ExperienceYearTransformer extends TransformerAbstract
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
    public function transform(ExperienceYear $experience)
    {
        return [
            'id' => $experience->id,
            'name_ar' => $experience->translate('ar')?->name ?? null,
            'name_en' => $experience->translate('en')?->name ?? null,
            'created_at' => $experience->created_at,

        ];
    }
}
