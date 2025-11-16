<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ContactUsTypeRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\ContactUsType;
use App\Transformers\ContactUsTypeTransformer;

class ContactUsTypeController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $types = ContactUsType::all();
        $data = $this->transformCollection($types);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(ContactUsTypeRequest $request)
    {
        $validated = $request->validated();
        
        $type = ContactUsType::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($type);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(ContactUsType $contactUsType)
    {
        $data = $this->transformItem($contactUsType);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(ContactUsTypeRequest $request, ContactUsType $contactUsType)
    {
        $validated = $request->validated();
        
        $contactUsType->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($contactUsType);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(ContactUsType $contactUsType)
    {
        $contactUsType->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new ContactUsTypeTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new ContactUsTypeTransformer())
            ->toArray()['data'];
    }
}