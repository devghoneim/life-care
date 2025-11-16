<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DepartmentRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\Department;
use App\Transformers\DepartmentTransformer;

class DepartmentController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $departments = Department::all();
        $data = $this->transformCollection($departments);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(DepartmentRequest $request)
    {
        $validated = $request->validated();
        
        $department = Department::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($department);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(Department $department)
    {
        $data = $this->transformItem($department);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $validated = $request->validated();
        
        $department->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($department);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(Department $department)
    {
        $department->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new DepartmentTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new DepartmentTransformer())
            ->toArray()['data'];
    }
}