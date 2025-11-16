<?php

namespace App\Transformers;

use App\Models\Landlord\ServiceProviderType;
use League\Fractal\TransformerAbstract;

class ServiceProviderTypeTransformer extends TransformerAbstract
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
    public function transform(ServiceProviderType $serviceProviderType)
    {
        return [
            'name_ar' => $serviceProviderType?->translate('ar')?->name,
            'name_en' => $serviceProviderType?->translate('en')?->name
        ];
    }
}
