<?php

namespace App\Models\Landlord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Specialty extends Model implements HasMedia
{
     use Translatable, InteractsWithMedia;

    protected $connection = 'landlord';
    protected $guarded = [];
    public $translatedAttributes = ['name'];
    protected $with = ['translations'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->useDisk('public');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
