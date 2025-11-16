<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Model;

class ExperienceYearTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['experience_year_id','name','local'];
}
