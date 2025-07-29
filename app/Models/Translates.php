<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translates extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'translates';
    protected $fillable = [
        'value',
        'key',
        'user_id',
    ];
    protected $casts = [
        'value' => 'json',
        'user_id' => "integer",
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
