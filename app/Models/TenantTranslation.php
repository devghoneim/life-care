<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description',];




}
