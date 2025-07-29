<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'contact_us';
    protected $fillable = [
        'user_info',
        'ip_address',
        'meta',
        'property_details',
        'setting_id'
    ];
    protected $casts = [
        'user_info' => "json",
        'meta' => "json",
        'property_details' => "json",
        'setting_id' => "integer"
    ];
    public function setting()
    {
        return $this->hasOne(Settings::class, 'id', 'setting_id');
    }
}
