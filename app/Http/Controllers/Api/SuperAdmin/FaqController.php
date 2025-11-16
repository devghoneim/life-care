<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\FaqRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\Faq;
use App\Transformers\FaqTransformer;

class FaqController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $faqs = Faq::all();
        $data = $this->transformCollection($faqs);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(FaqRequest $request)
    {
        $validated = $request->validated();
        
        $faq = Faq::create([
            'ar' => [
                'question' => $validated['question_ar'],
                'answer' => $validated['answer_ar'],
            ],
            'en' => [
                'question' => $validated['question_en'],
                'answer' => $validated['answer_en'],
            ],
        ]);
        
        $data = $this->transformItem($faq);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(Faq $faq)
    {
        $data = $this->transformItem($faq);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(FaqRequest $request, Faq $faq)
    {
        $validated = $request->validated();
        
        $faq->update([
            'ar' => [
                'question' => $validated['question_ar'],
                'answer' => $validated['answer_ar'],
            ],
            'en' => [
                'question' => $validated['question_en'],
                'answer' => $validated['answer_en'],
            ],
        ]);
        
        $data = $this->transformItem($faq);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new FaqTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new FaqTransformer())
            ->toArray()['data'];
    }
}