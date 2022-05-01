<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'prd_no';
    public $incrementing = true;

    protected $dates = ['deleted_at'];
}
