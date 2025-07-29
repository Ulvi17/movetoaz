<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhyChooseUs extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'why_choose_us';
    protected $fillable = [
        'name',
        'description',
        'order_number',
        'status',
        'user_id',
        'setting_id',
        'images',
        'additional_data',
    ];
    protected $casts = [
        'name' => 'json',
        'description' => 'json',
        'images' => 'json',
        'additional_data' => 'json',
        'status' => 'boolean',
        'order_number' => 'integer',
        'user_id' => 'integer',
        'setting_id' => 'integer',
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
