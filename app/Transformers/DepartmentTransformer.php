<?php

namespace App\Transformers;

use App\Models\Landlord\Department;
use League\Fractal\TransformerAbstract;

class DepartmentTransformer extends TransformerAbstract
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
    public function transform(Department $department)
    {
         return [
            'id' => $department->id,
            'name' => $department->name,
            'created_at' => $department?->created_at,
        ];
    }
}
