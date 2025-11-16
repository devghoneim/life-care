<?php

namespace App\Models\Landlord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class InsuranceCompany extends Model implements HasMedia
{
    use Translatable, InteractsWithMedia;

    protected $connection = 'landlord';
    protected $guarded = [];
    public $translatedAttributes = ['name'];
    protected $with = ['translations'];
    public $translationForeignKey= 'insurancey_id';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->useDisk('public');
    }
}
