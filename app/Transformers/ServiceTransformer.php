<?php

namespace App\Transformers;

use App\Models\Landlord\Service;
use League\Fractal\TransformerAbstract;

class ServiceTransformer extends TransformerAbstract
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
    public function transform(Service $service)
    {
        return [
            'name_ar' => $service?->translate('ar')?->name,
            'name_en' => $service?->translate('en')?->name,
            'provider_type_id' => $service?->providertype?->name,
            'image' => $service->getFirstMediaUrl('image'),
        ];
    }
}
