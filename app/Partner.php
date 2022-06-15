<?php
 namespace App;
 
 use Illuminate\Notifications\Notifiable;
 use Illuminate\Foundation\Auth\User as Authenticatable;

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Authenticatable
{
    use Notifiable;
    //use HasFactory;

    //protected $connection = 'partner';  요것이 디비선택
    protected $guard = 'partner';
    protected $primaryKey = 'p_no';
    public $incrementing = true;
    //protected $keyType = 'string';

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];
  
}
