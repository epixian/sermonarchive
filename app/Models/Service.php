<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App\Models
 * 
 * @property Sermon $sermon
 * @property Collection|Message[] $message
 */
class Service extends Model
{
    use HasFactory;

    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get chat messages related to the service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the sermon associated with this service.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sermon()
    {
        return $this->hasOne(Sermon::class);
    }

    /**
     * Get the public URL for the service.
     * @return string
     */
    public function path()
    {
        return '/services/' . $this->id;
    }
}
