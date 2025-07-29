<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'name',
        'description',
        'slugs',
        'images',
        'video',
        'order_number',
        'additional_data',
        'status',
        'user_id',
        'setting_id',
        'top_service_id',
    ];
    protected $casts = [
        'name' => 'json',
        'slugs' => "json",
        'description' => "json",
        'images' => "json",
        'additional_data' => "json",
        'status' => 'boolean',
        'user_id' => "integer",
        'setting_id' => "integer",
        'top_service_id' => "integer",
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function setting()
    {
        return $this->hasOne(Settings::class, 'id', 'setting_id');
    }
    public function top_service()
    {
        return $this->hasOne(Services::class, 'id', 'top_service_id');
    }
    public function child_services()
    {
        return $this->hasMany(Services::class, 'top_service_id', 'id')->orderBy('order_number', 'ASC');
    }
    public function products()
    {
        return $this->hasMany(ProductServices::class, 'service_id', 'id');
    }
}
