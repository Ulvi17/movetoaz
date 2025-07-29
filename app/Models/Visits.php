<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visits extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'visits';
    protected $fillable = [
        'ip_address',
        'url',
        'meta',
        'status',
        'setting_id',
        'element_id',
        'element_type',
        'user_id'
    ];
    protected $casts = [
        'meta' => "json",
        'status' => "boolean",
        'setting_id' => "integer",
        'element_id' => "integer",
        'user_id' => "integer"
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
