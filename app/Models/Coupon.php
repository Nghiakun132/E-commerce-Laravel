<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable =   [
        'cp_name','cp_code','cp_qty','cp_time','cp_condition'
    ];
    protected $primaryKey='cp_id';
    protected $table = 'coupon';
}
