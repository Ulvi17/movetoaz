<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'slugs',
        'address',
        'prices',
        'images',
        'order_number',
        'additional_data',
        'status',
        'user_id',
        'setting_id',
        'category_id',
    ];
    protected $casts = [
        'name' => 'json',
        'slugs'=>"json",
        'description' => "json",
        'address'=>"json",
        'images' => "json",
        'prices' => "json",
        'additional_data' => "json",
        'status' => 'boolean',
        'user_id' => "integer",
        'setting_id' => "integer",
        'category_id' => "integer",
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function setting()
    {
        return $this->hasOne(Settings::class, 'id', 'setting_id');
    }
    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }
    public function services()
    {
        return $this->hasMany(ProductServices::class, 'product_id', 'id');
    }
}
