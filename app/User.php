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

    public function metas() {
        return $this->hasMany(UserMeta::class, 'user_id');
    }

    public function meta($meta_key = '') {
        if ($meta_key == '') {
            $res = $this->hasMany(UserMeta::class, 'user_id')->get();
            $formatted_arr = [];
            foreach ($res as $key => $value) {
                $formatted_arr[$value->meta_key] = json_decode($value->meta_value); 
            }
            return $formatted_arr;
        } else {
            $res = $this->hasMany(UserMeta::class, 'user_id')->where('meta_key', '=', $meta_key)->first();
            if ($res)
                return json_decode($res->meta_value);
            else
                return false;
        }
    }

    public function update_meta($meta_key, $meta_value = '') {
        $res = $this->hasMany(UserMeta::class, 'user_id')->where('meta_key', '=', $meta_key)->first();
        if ($res) {
            $res->meta_value = json_encode($meta_value);
            $res->save();
            return true;
        } else
            return false;
    }
}
