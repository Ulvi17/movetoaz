<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aksiyalar extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'aksiyalars';
    protected $fillable = [
        'name',
        'slugs',
        'description',
        'images',
        'order_number',
        'status',
        'user_id',
        'setting_id',
    ];
    protected $casts = [
        'name' => 'json',
        'slugs'=>"json",
        'description'=>"json",
        'images'=>"json",
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
