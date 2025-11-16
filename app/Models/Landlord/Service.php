<?php

namespace App\Models\Landlord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use Translatable , InteractsWithMedia;
    protected $connection = 'landlord';
    protected $fillable = ['provider_type_id',];

    public $translatedAttributes = ['name'];
    public $with = ['translations'];

    public function registerMediaCollections(): void
        {
            $this->addMediaCollection('image')
            ->singleFile()
            ->useDisk('landlord_media') ;
        
        }

    public function providerType(){return $this->belongsTo(ServiceProviderType::class);}

    
}
