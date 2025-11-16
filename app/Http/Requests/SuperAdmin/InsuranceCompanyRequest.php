<?php


namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InsuranceCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return $this->isMethod('PUT') || $this->isMethod('PATCH')
            ? $this->onUpdate()
            : $this->onCreate();
    }

    protected function onCreate(): array
    {
        return [
            'name_ar' => 'required|string|max:255|unique:insurance_company_translations,name',
            'name_en' => 'required|string|max:255|unique:insurance_company_translations,name',
            'administrator' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:insurance_companies,email',
            'image' => 'required|image|max:5120',
        ];
    }

    protected function onUpdate(): array
    {
        $companyId = $this->route('insurance_company')->id;
        
        return [
            'name_ar' => [
                'required',
                'string',
                'max:255',
                Rule::unique('insurance_company_translations', 'name')
                    ->ignore($companyId, 'insurance_company_id')
                    ->where('locale', 'ar'),
            ],
            'name_en' => [
                'required',
                'string',
                'max:255',
                Rule::unique('insurance_company_translations', 'name')
                    ->ignore($companyId, 'insurance_company_id')
                    ->where('locale', 'en'),
            ],
            'administrator' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('insurance_companies', 'email')->ignore($companyId),
            ],
            'image' => 'nullable|image|max:5120',
        ];
    }
}