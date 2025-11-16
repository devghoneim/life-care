<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ExperienceYearRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Landlord\ExperienceYear;
use App\Transformers\ExperienceYearTransformer;

class ExperienceYearController extends Controller
{
    use ApiResponse;
    
     private function transformItem($item)
{
    return fractal()
        ->item($item)
        ->transformWith(new ExperienceYearTransformer())
        ->toArray()['data'];
}

private function transformCollection($collection)
{
    return fractal()
        ->collection($collection)
        ->transformWith(new ExperienceYearTransformer())
        ->toArray()['data'];
}

        public function index()
    {
        $experienceYear = ExperienceYear::all();
        $data = $this->transformCollection($experienceYear);

        return $this->successResponse(__('messages.success'),$data);

    }

    public function store(ExperienceYearRequest $experienceYear)
    {

       
            $validated = $experienceYear->validated();
            $experienceYear = ExperienceYear::create([
                'ar' => ['name'=>$validated['name_ar']],
                'en' => ['name'=>$validated['name_en']],
            ]);

            $data = $this->transformItem($experienceYear);

        return $this->successResponse(__('messages.success'),$data);

       


    }

    public function show(ExperienceYear $experienceYear)
    {
          $data = $this->transformItem($experienceYear);
        return $this->successResponse(__('messages.success'),$data);
    }

    public function update(ExperienceYearRequest $experienceYearRequest , ExperienceYear $experienceYear)
    {
        
        $validated = $experienceYearRequest->validated();

        $experienceYear->update([
            'ar'=>['name'=> $validated['name_ar']],
            'en'=> ['name'=> $validated['name_en']]
        ]);
                  $data = $this->transformItem($experienceYear);

        return $this->successResponse(__('messages.updated_successfully'),$data);


    }

    public function destroy(ExperienceYear $experienceYear)
    {

        $experienceYear->delete();
        return $this->successResponse(__('messages.deleted_successfully'));

    }

   
}
