<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'slugs',
        'images',
        'order_number',
        'additional_data',
        'status',
        'user_id',
        'setting_id',
        'top_category_id',
    ];
    protected $casts = [
        'name' => 'json',
        'slugs'=>"json",
        'description' => "json",
        'images' => "json",
        'additional_data' => "json",
        'status' => 'boolean',
        'user_id' => "integer",
        'setting_id' => "integer",
        'top_category_id' => "integer",
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function setting()
    {
        return $this->hasOne(Settings::class, 'id', 'setting_id');
    }
    public function top_category()
    {
        return $this->hasOne(Categories::class, 'id', 'top_category_id');
    }
    public function products(){
        return $this->hasMany(Products::class,'id','category_id');
    }
}
