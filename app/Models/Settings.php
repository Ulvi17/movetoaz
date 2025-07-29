<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'settings';
    protected $fillable = [
        'name',
        'description',
        'domain',
        'logos',
        'langs',
        'address',
        'social_media',
        'additional_data',
        'user_id'
    ];
    protected $casts = [
        'name' => 'json',
        'description' => "json",
        'logos' => "json",
        'langs' => "json",
        'address' => "json",
        'social_media' => "json",
        'additional_data' => "json",
        'user_id' => "integer"
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
