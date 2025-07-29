<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductServices extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_services';
    protected $fillable = [
        'product_id',
        'service_id',
        'user_id'
    ];
    protected $casts = [
        'product_id' => "integer",
        'service_id' => "integer",
        'user_id' => "integer"
    ];
    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
    public function service()
    {
        return $this->hasOne(Services::class, 'id', 'service_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
