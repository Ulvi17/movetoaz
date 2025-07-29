<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPackages extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subscription_packages';
    protected $fillable = [
        'name',
        'slugs',
        'description',
        'images',
        'details',
        'order_number',
        'status',
        'user_id',
        'category_id',
        'setting_id',
    ];
    protected $casts = [
        'name' => 'json',
        'slugs' => 'json',
        'description' => "json",
        'images' => "json",
        'details' => "json",
        'status' => 'boolean',
        'user_id' => "integer",
        'category_id' => "integer",
        'setting_id' => "integer",
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }
    public function setting()
    {
        return $this->hasOne(Settings::class, 'id', 'setting_id');
    }
}
