<?php

namespace App\Models\Landlord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use Translatable;

    protected $connection = 'landlord';
    protected $guarded = [];
    public $translatedAttributes = ['question', 'answer'];
    protected $with = ['translations'];
}
