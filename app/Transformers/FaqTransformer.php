<?php

namespace App\Transformers;

use App\Models\Landlord\Faq;
use League\Fractal\TransformerAbstract;

class FaqTransformer extends TransformerAbstract
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
    public function transform(Faq $faq)
    {
           return [
            'id' => $faq->id,
            'question' => $faq->question,
            'answer' => $faq->answer,
            'created_at' => $faq?->created_at,
        ];
    }
}
