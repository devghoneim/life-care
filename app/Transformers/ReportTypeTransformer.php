<?php

namespace App\Transformers;

use App\Models\Landlord\ReportType;
use League\Fractal\TransformerAbstract;

class ReportTypeTransformer extends TransformerAbstract
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
    public function transform(ReportType $reportType)
    {
           return [
            'id' => $reportType->id,
            'name_ar' => $reportType->translate('ar')->name,
            'name_en' => $reportType->translate('en')->name,
            'created_at' => $reportType?->created_at,
        ];
    }
}
