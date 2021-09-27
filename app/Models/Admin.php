<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $fillable =   [
        'name','email','phone','address','avatar'
    ];
    protected $table = 'admins';
    protected $primaryKey='id';
}
