<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ReportTypeRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\ReportType;
use App\Transformers\ReportTypeTransformer;

class ReportTypeController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $reportTypes = ReportType::all();
        $data = $this->transformCollection($reportTypes);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(ReportTypeRequest $request)
    {
        $validated = $request->validated();
        
        $reportType = ReportType::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($reportType);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(ReportType $reportType)
    {
        $data = $this->transformItem($reportType);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(ReportTypeRequest $request, ReportType $reportType)
    {
        $validated = $request->validated();
        
        $reportType->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($reportType);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(ReportType $reportType)
    {
        $reportType->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new ReportTypeTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new ReportTypeTransformer())
            ->toArray()['data'];
    }
}