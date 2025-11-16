<?php


namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\InsuranceCompanyRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\InsuranceCompany;
use App\Transformers\InsuranceCompanyTransformer;

class InsuranceCompanyController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $companies = InsuranceCompany::all();
        $data = $this->transformCollection($companies);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function store(InsuranceCompanyRequest $request)
    {
        $validated = $request->validated();
        
        $company = InsuranceCompany::create([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
            'administrator' => $validated['administrator'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
        ]);
        
        $company->addMedia($validated['image'])->toMediaCollection('image');
        
        $data = $this->transformItem($company);
        
        return $this->successResponse(__('messages.created_successfully'), $data, 201);
    }

    public function show(InsuranceCompany $insuranceCompany)
    {
        $data = $this->transformItem($insuranceCompany);
        
        return $this->successResponse(__('messages.success'), $data);
    }

    public function update(InsuranceCompanyRequest $request, InsuranceCompany $insuranceCompany)
    {
        $validated = $request->validated();
        
        $insuranceCompany->update([
            'ar' => ['name' => $validated['name_ar']],
            'en' => ['name' => $validated['name_en']],
            'administrator' => $validated['administrator'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
        ]);
        
        if ($request->hasFile('image')) {
            $insuranceCompany->clearMediaCollection('image');
            $insuranceCompany->addMedia($validated['image'])->toMediaCollection('image');
        }
        
        $data = $this->transformItem($insuranceCompany);
        
        return $this->successResponse(__('messages.updated_successfully'), $data);
    }

    public function destroy(InsuranceCompany $insuranceCompany)
    {
        $insuranceCompany->clearMediaCollection('image');
        $insuranceCompany->delete();
        
        return $this->successResponse(__('messages.deleted_successfully'));
    }

    private function transformItem($item)
    {
        return fractal()
            ->item($item)
            ->transformWith(new InsuranceCompanyTransformer())
            ->toArray()['data'];
    }

    private function transformCollection($collection)
    {
        return fractal()
            ->collection($collection)
            ->transformWith(new InsuranceCompanyTransformer())
            ->toArray()['data'];
    }
}