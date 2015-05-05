<?php


namespace app;


use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $visible = [
        'id',
        'first_name',
        'last_name',
        'email',
        'remember_token'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    public function timeEntries()
    {
        $this->hasMany('App\TimeEntry');
    }
}