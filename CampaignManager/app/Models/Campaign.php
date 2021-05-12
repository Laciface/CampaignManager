<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_day',
        'last_day',
        'status',
        'is_running'
    ];

    protected $casts = [
        'products' => 'array',
        'posts' => 'array',
        'coupons' => 'array'
    ];
}
