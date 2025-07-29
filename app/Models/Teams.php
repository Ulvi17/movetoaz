<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teams extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'teams';
    protected $fillable = [
        'name',
        'position',
        'description',
        'slugs',
        'image',
        'order_number',
        'additional_data',
        'social_media',
        'status',
        'user_id',
        'setting_id',
    ];
    protected $casts = [
        'name' => 'json',
        'slugs' => "json",
        'position' => "json",
        'description' => "json",
        'additional_data' => "json",
        'social_media' => 'json',
        'status' => 'boolean',
        'user_id' => "integer",
        'setting_id' => "integer",
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function setting()
    {
        return $this->hasOne(Settings::class, 'id', 'setting_id');
    }
}
