<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that should be appended to JSON results.
     *
     * @var array
     */
    protected $appends = [
        'gravatar',
        'can',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'custom' => 'array',
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'breeze_id',
    ];

    /**
     * The attributes that should be visible for arrays.
     *
     * @var array
     */
    protected $visible = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'breeze_id',
        'gravatar',
        'can',
    ];

    /**
     * Get messages belonging to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Returns the gravatar URL.
     *
     * @return string
     */
    public function getGravatarAttribute()
    {
        return $this->gravatar_url();
    }

    /**
     * Returns all permissions (direct and indirect) granted to the user.
     *
     * @return array
     */
    public function getCanAttribute()
    {
        return $this->getAllPermissions()->pluck('name');
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boolean $img True to return a complete IMG tag False for just the URL
     * @param array $attributes Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    function gravatar_url($s = 80, $d = 'mp', $r = 'g', $img = false, $attributes = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($this->email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($attributes as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

    /**
     * Get the public URL for the service.
     * @return string
     */
    public function path()
    {
        return '/admin/users/' . $this->id;
    }
}
