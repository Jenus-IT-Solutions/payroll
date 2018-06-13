<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guard_name = 'web'; // or whatever guard you want to use

    public static function canDo($string, $show404 = true) {
        if (\Auth::check()) {
            $user = self::find(\Auth::id());
            if ($show404 && ! $user->can($string))
                abort(403, 'Unauthorized action.');
            else 
                return $user->can($string);
        }
    }
}
