<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Model;

class VisitTypeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
