<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Multitenancy\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements HasMedia
{
    use Translatable , InteractsWithMedia;

    protected $connection = 'landlord';
    protected $fillable = [
        'email',
        'password',
        'phone',
        'domain',
        'database',
        'service_provider_type_id',
    ];

    protected $hidden = ['password'];
    public $translatedAttributes = ['name','description'];
    protected $with = ['translations'];


}
