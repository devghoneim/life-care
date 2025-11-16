<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ScientificDegreeRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\ScientificDegree;
use App\Transformers\ScientificDegreeTransformer;

class ScientificDegreeController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $degrees = ScientificDegree::all();
        $data = $this->transformCollection($degrees);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(ScientificDegreeRequest $request)
    {
        $validated = $request->validated();
        
        $degree = ScientificDegree::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($degree);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(ScientificDegree $scientificDegree)
    {
        $data = $this->transformItem($scientificDegree);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(ScientificDegreeRequest $request, ScientificDegree $scientificDegree)
    {
        $validated = $request->validated();
        
        $scientificDegree->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($scientificDegree);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(ScientificDegree $scientificDegree)
    {
        $scientificDegree->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new ScientificDegreeTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new ScientificDegreeTransformer())
            ->toArray()['data'];
    }
}
