<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable =   [
        'cp_code','cp_expiry','cp_value','created_at'
    ];
    protected $primaryKey='cp_id';
    protected $table = 'coupon';
}
