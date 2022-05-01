<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StandardPrice extends Model
{
    use HasFactory;

    protected $primaryKey = 'sl_no';
    public $incrementing = true;

    protected $dates = ['deleted_at'];    
}
