<?php


namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtyRequest extends FormRequest
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
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'required|image|max:5120',
            'department_id' => 'required|exists:departments,id',
        ];
    }

    protected function onUpdate(): array
    {
        return [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'nullable|image|max:5120',
            'department_id' => 'required|exists:departments,id',
        ];
    }
}