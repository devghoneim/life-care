<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ServiceProviderTypeRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\ServiceProviderType;
use App\Transformers\ServiceProviderTypeTransformer;

class ServiceProviderTypeController extends Controller
{
    use ApiResponse;

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new ServiceProviderTypeTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new ServiceProviderTypeTransformer())
            ->toArray()['data'];
    }

    public function index()
    {
        $serviceProviderType = ServiceProviderType::all();
        $data = $this->transformCollection($serviceProviderType);

        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(ServiceProviderTypeRequest $serviceProviderType)
    {


        $validated = $serviceProviderType->validated();
        $serviceProviderType = ServiceProviderType::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);

        $data = $this->transformItem($serviceProviderType);

        return $this->successResponse(__('messages.success'), $data);
    }

    public function show(ServiceProviderType $serviceProviderType)
    {
        $data = $this->transformItem($serviceProviderType);
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(ServiceProviderTypeRequest $serviceProviderTypeRequest, ServiceProviderType $serviceProviderType)
    {

        $validated = $serviceProviderTypeRequest->validated();

        $serviceProviderType->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']]
        ]);
        $data = $this->transformItem($serviceProviderType);

        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(ServiceProviderType $serviceProviderType)
    {

        $serviceProviderType->delete();
        return $this->successResponse(__('messages.deleted_successfully'));
    }
}
