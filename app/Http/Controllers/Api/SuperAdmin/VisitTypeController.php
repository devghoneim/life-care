<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\VisitTypeRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\VisitType;
use App\Transformers\VisitTypeTransformer;

class VisitTypeController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $visitTypes = VisitType::all();
        $data = $this->transformCollection($visitTypes);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(VisitTypeRequest $request)
    {
        $validated = $request->validated();
        
        $visitType = VisitType::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($visitType);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(VisitType $visitType)
    {
        $data = $this->transformItem($visitType);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(VisitTypeRequest $request, VisitType $visitType)
    {
        $validated = $request->validated();
        
        $visitType->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($visitType);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(VisitType $visitType)
    {
        $visitType->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new VisitTypeTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new VisitTypeTransformer())
            ->toArray()['data'];
    }
}