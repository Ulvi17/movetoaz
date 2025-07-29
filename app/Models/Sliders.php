<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sliders extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sliders';
    protected $fillable = [
        'name',
        'description',
        'button_data',
        'image_or_video',
        'type_of',
        'image',
        'order_number',
        'status',
        'user_id',
        'setting_id',
    ];
    protected $casts = [
        'name' => 'json',
        'description' => "json",
        'button_data' => "json",
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
