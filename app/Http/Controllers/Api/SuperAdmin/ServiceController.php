<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ServiceRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\Service;
use App\Transformers\ServiceTransformer;

class ServiceController extends Controller
{
     use ApiResponse;
    
     private function transformItem($item)
{
    return fractal()
        ->item($item)
        ->transformWith(new ServiceTransformer())
        ->toArray()['data'];
}

private function transformCollection($collection)
{
    return fractal()
        ->collection($collection)
        ->transformWith(new ServiceTransformer())
        ->toArray()['data'];
}

        public function index()
    {
        $service = Service::all();
        $data = $this->transformCollection($service);

        return $this->successResponse(__('messages.success'),$data);

    }

    public function store(ServiceRequest $service)
    {

        
        $validated = $service->validated();
            $service = Service::create([
                'ar' => ['name'=>$validated['name_ar']],
                'en' => ['name'=>$validated['name_en']],
                'provider_type_id' =>  $validated['provider_id'] ?? null 
            ]);
            $service->addMedia($validated['image'])->toMediaCollection('image');

            $data = $this->transformItem($service);

             return $this->successResponse(__('messages.success'),$data);

       


    }

    public function show(Service $service)
    {
          $data = $this->transformItem($service);
        return $this->successResponse(__('messages.success'),$data);
    }

    public function update(ServiceRequest $serviceRequest , Service $service)
    {
        
        $validated = $serviceRequest->validated();

         $service->update([
                'ar' => ['name'=>$validated['name_ar']],
                'en' => ['name'=>$validated['name_en']],
                'provider_type_id' =>  $validated['provider_id'] ?? null 
        ]);
        if ($serviceRequest->hasFile('image')) {
            $service->clearMediaCollection('image');
            $service->addMedia($validated['image'])->toMediaCollection('image');
            
        }

                  $data = $this->transformItem($service);

        return $this->successResponse(__('messages.updated_successfully'),$data);


    }

    public function destroy(Service $experienceYear)
    {

        $experienceYear->delete();
        return $this->successResponse(__('messages.deleted_successfully'));

    }
}
