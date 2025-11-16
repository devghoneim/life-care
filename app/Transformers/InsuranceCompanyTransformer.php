<?php

namespace App\Transformers;

use App\Models\Landlord\InsuranceCompany;
use League\Fractal\TransformerAbstract;

class InsuranceCompanyTransformer extends TransformerAbstract
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
    public function transform(InsuranceCompany $company)
    {
           return [
            'id' => $company->id,
            'name' => $company->name,
            'administrator' => $company->administrator,
            'phone' => $company->phone,
            'email' => $company->email,
            'image_url' => $company->getFirstMediaUrl('image'),
            'created_at' => $company?->created_at,
        ];
    }
}
