<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\SupportTicket;
use App\Transformers\SupportTicketTransformer;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        $query = SupportTicket::with(['user', 'serviceProvider', 'contactUsType']);

        if ($request->has('contact_us_type_id')) {
            $query->where('contact_us_type_id', $request->contact_us_type_id);
        }

        if ($request->has('service_provider_id')) {
            $query->where('service_provider_id', $request->service_provider_id);
        }

        if ($request->has('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $tickets = $query->latest()->paginate(20);
        
        $data = fractal()
            ->collection($tickets->items())
            ->transformWith(new SupportTicketTransformer())
            ->toArray()['data'];

        // return $this->paginatedResponse($tickets, __('messages.success'));
    }

    public function show(SupportTicket $supportTicket)
    {
        $supportTicket->load(['user', 'serviceProvider', 'contactUsType']);
        
        $data = fractal()
            ->item($supportTicket)
            ->transformWith(new SupportTicketTransformer())
            ->toArray()['data'];
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function updateStatus(Request $request, SupportTicket $supportTicket)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved,closed',
        ]);

        $supportTicket->update(['status' => $validated['status']]);

        $data = fractal()
            ->item($supportTicket)
            ->transformWith(new SupportTicketTransformer())
            ->toArray()['data'];

        return $this->successResponse(__('messages.updated_successfully'), $data);
    }
}