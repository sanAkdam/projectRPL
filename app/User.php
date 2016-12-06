<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait, Notifiable;
    protected $table = 'users';

    protected $primaryKey = 'nim';

    protected $fillable = [
        'nim',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    public function report() {
        return $this->hasMany('App\Report');
    }

    public function posting() {
        return $this->hasMany('App\Posting');
    }

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }
}
