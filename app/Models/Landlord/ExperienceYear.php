<?php

namespace App\Models\Landlord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ExperienceYear extends Model
{
    use Translatable ;
    protected $connection= 'landlord';
    protected $guarded = [];
    public $translatedAttributes = ['name'];
    protected $with = ['translations'];
}
