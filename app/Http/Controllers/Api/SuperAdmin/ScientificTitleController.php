<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ScientificTitleRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\ScientificTitle;
use App\Transformers\ScientificTitleTransformer;

class ScientificTitleController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $titles = ScientificTitle::all();
        $data = $this->transformCollection($titles);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(ScientificTitleRequest $request)
    {
        $validated = $request->validated();
        
        $title = ScientificTitle::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($title);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(ScientificTitle $scientificTitle)
    {
        $data = $this->transformItem($scientificTitle);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(ScientificTitleRequest $request, ScientificTitle $scientificTitle)
    {
        $validated = $request->validated();
        
        $scientificTitle->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
        ]);
        
        $data = $this->transformItem($scientificTitle);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(ScientificTitle $scientificTitle)
    {
        $scientificTitle->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new ScientificTitleTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new ScientificTitleTransformer())
            ->toArray()['data'];
    }
}