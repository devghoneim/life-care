<?php

namespace App\Models\Landlord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderType extends Model
{
    use Translatable;

    protected $connection = 'landlord';
    protected $guarded = []; 
    public $translatedAttributes = ['name']; 
    protected $with = ['translations'];
    public $translationForeignKey = 'sp_type_id';

    public function services(){return $this->hasMany(Service::class,'provider_type_id');}

    
}
