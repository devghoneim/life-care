<?php

namespace App\Transformers;

use App\Models\Landlord\SupportTicket;
use League\Fractal\TransformerAbstract;

class SupportTicketTransformer extends TransformerAbstract
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
    public function transform(SupportTicket $ticket)
    {
            return [
            'id' => $ticket->id,
            'user_name' => $ticket->user->name ?? null,
            'user_email' => $ticket->user->email ?? null,
            'problem_type' => $ticket->contactUsType?->name,
            'provider' => $ticket->serviceProvider?->name ?? null,
            'message' => $ticket->message,
            'status' => $ticket->status,
            'date' => $ticket->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
