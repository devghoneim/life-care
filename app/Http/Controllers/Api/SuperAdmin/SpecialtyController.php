<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\SpecialtyRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\Specialty;
use App\Transformers\SpecialtyTransformer;

class SpecialtyController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $specialties = Specialty::with('department')->get();
        $data = $this->transformCollection($specialties);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(SpecialtyRequest $request)
    {
        $validated = $request->validated();
        
        $specialty = Specialty::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
            'department_id' => $validated['department_id'],
        ]);
        
        $specialty->addMedia($validated['image'])->toMediaCollection('image');
        
        $data = $this->transformItem($specialty);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(Specialty $specialty)
    {
        $specialty->load('department');
        $data = $this->transformItem($specialty);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(SpecialtyRequest $request, Specialty $specialty)
    {
        $validated = $request->validated();
        
        $specialty->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
            'department_id' => $validated['department_id'],
        ]);
        
        if ($request->hasFile('image')) {
            $specialty->clearMediaCollection('image');
            $specialty->addMedia($validated['image'])->toMediaCollection('image');
        }
        
        $data = $this->transformItem($specialty);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(Specialty $specialty)
    {
        $specialty->clearMediaCollection('image');
        $specialty->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new SpecialtyTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new SpecialtyTransformer())
            ->toArray()['data'];
    }
}