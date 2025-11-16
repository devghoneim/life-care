<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
       protected $connection = 'landlord';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(\App\Models\Tenant::class, 'service_provider_id');
    }

    public function contactUsType()
    {
        return $this->belongsTo(ContactUsType::class);
    }
}
