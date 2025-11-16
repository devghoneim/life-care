<?php

namespace App\Transformers;

use App\Models\Landlord\ContactUsType;
use League\Fractal\TransformerAbstract;

class ContactUsTypeTransformer extends TransformerAbstract
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
    public function transform(ContactUsType $type)
    {
        return [
            'id' => $type->id,
            'name' => $type->name,
            'created_at' => $type?->created_at,
        ];
    }
}
